<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TrainingCategoryController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($isTrashed = false)
    {

        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            $training_categories = TrainingCategory::orderBy('id', 'desc')->get();

            $datatable = DataTables::of($training_categories)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-primary btn-sm-custom" title="View Training Category Details" href="' . route('training-categories.show', $row->id) . '"><i class="icofont icofont-eye-alt"></i></a>';
                        $deleteRoute =  route('training-categories.destroy', [$row->id]);
                        $html .= '<a class="btn waves-effect waves-light btn-success btn-sm-custom ml-1" title="Edit Training Category Details" href="' . route('training-categories.edit', $row->id) . '"><i class="icofont icofont-edit"></i></a>';
                        $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm-custom ml-1 text-white" title="Delete Item" id="deleteItem' . $row->id . '"><i class="icofont icofont-trash"></i></a>';

                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Training Category will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
                                }).then((result) => { if (result.value) {$("#deleteForm' . $row->id . '").submit();}})
                            });
                        </script>';

                        $html .= '
                            <form id="deleteForm' . $row->id . '" action="' . $deleteRoute . '" method="post" style="display:none">' . $csrf . $method_delete . '
                                <button type="submit" class="btn waves-effect waves-light btn-rounded btn-success"><i
                                        class="icofont icofont-check"></i> Confirm Delete</button>
                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-secondary" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Cancel</button>
                            </form>';
                        return $html;
                    }
                )

                ->editColumn('name', function ($row) {
                    return $row->name;
                })
                ->editColumn('status', function ($row) {
                    if ($row->status) {
                        return '<span class="label label-success font-weight-100">Active</span>';
                    } else if ($row->deleted_at != null) {
                        return '<span class="label label-danger">Trashed</span>';
                    } else {
                        return '<span class="label label-warning">Inactive</span>';
                    }
                });
            $rawColumns = ['action', 'name', 'status'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }
        return view('backend.dashboard.admin.training_categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        return view('backend.dashboard.admin.training_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $request->validate([
            'name'  => 'required|max:100|unique:training_categories,name,NULL,id,deleted_at,NULL',
        ]);

        $training_category = new TrainingCategory();
        $training_category->name = $request->name;
        $training_category->status = $request->status;
        $training_category->save();

        session()->flash('success', 'New Training Category has been created successfully !!');
        return redirect()->route('training-categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $training_category = TrainingCategory::find($id);
        if (is_null($training_category)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('training-categories.index');
        }
        return view('backend.dashboard.admin.training_categories.show', compact('training_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $training_category = TrainingCategory::find($id);
        if (is_null($training_category)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('training-categories.index');
        }
        return view('backend.dashboard.admin.training_categories.edit', compact('training_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $training_category = TrainingCategory::find($id);
        if (is_null($training_category)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('training-categories.index');
        }

        $request->validate([
            'name'  => 'required|max:100|unique:training_categories,id,' . $id,
        ]);

        $training_category->name = $request->name;
        $training_category->status = $request->status;
        $training_category->save();
        session()->flash('success', 'Training Category has been updated successfully !!');
        return redirect()->route('training-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $training_category = TrainingCategory::find($id);
        if (is_null($training_category)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('training-categories.index');
        }
        $training_category->delete();

        session()->flash('success', 'Training Category has been deleted successfully!!');
        return redirect()->route('training-categories.index');
    }
}
