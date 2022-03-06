<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\TrainingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TrainingController extends Controller
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
            $trainings = Training::orderBy('id', 'desc')->get();

            $datatable = DataTables::of($trainings)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-primary btn-sm-custom" title="View Training Details" href="' . route('trainings.show', $row->id) . '"><i class="icofont icofont-eye-alt"></i></a>';
                        $deleteRoute =  route('trainings.destroy', [$row->id]);
                        $html .= '<a class="btn waves-effect waves-light btn-success btn-sm-custom ml-1" title="Edit Training Details" href="' . route('trainings.edit', $row->id) . '"><i class="icofont icofont-edit"></i></a>';
                        $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm-custom ml-1 text-white" title="Delete Item" id="deleteItem' . $row->id . '"><i class="icofont icofont-trash"></i></a>';

                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Training will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
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

                ->editColumn('title', function ($row) {
                    return $row->title;
                })
                ->editColumn('training_category_id', function ($row) {
                    return $row->training_category ? $row->training_category->name : '';
                })
                ->editColumn('price', function ($row) {
                    return $row->price;
                })
                ->editColumn('discount_price', function ($row) {
                    return $row->discount_price;
                })
                ->editColumn('image', function ($row) {
                    if ($row->image != null) {
                        return "<img src='" . asset('uploaded_files/images/trainings/' . $row->image) . "' width='60' height='40'/>";
                    }
                    return '-';
                });
            $rawColumns = ['action', 'title', 'training_category_id', 'price', 'image'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }
        return view('backend.dashboard.admin.trainings.index');
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
        $training_categories = TrainingCategory::where('status', 1)->get();
        return view('backend.dashboard.admin.trainings.create', compact('training_categories'));
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
            'title'  => 'required|string|unique:trainings,title,NULL,id,deleted_at,NULL',
            'training_category_id'  => 'required|integer|exists:training_categories,id,deleted_at,NULL',
            'description'  => 'nullable|string',
            'tags'  => 'nullable|string',
            'price'  => 'required|numeric',
            'discount_price'  => 'nullable|numeric',
            'image'  => 'nullable|mimes:jpg,jpeg,png,webp,svg',
        ]);

        $training = new Training();
        $training->title = $request->title;
        $training->training_category_id = $request->training_category_id;
        $training->description = $request->description ?? null;
        $training->tags = $request->tags ?? null;
        $training->price = $request->price;
        $training->discount_price = $request->discount_price ?? 0;

        if (!is_null($request->image)) {
            $training->image = UploadHelper::upload('image', $request->image, $request->title . '-' . time(), 'uploaded_files/images/trainings');
        }
        $training->save();

        session()->flash('success', 'New Training has been created successfully !!');
        return redirect()->route('trainings.index');
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
        $training = Training::find($id);
        if (is_null($training)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('trainings.index');
        }
        return view('backend.dashboard.admin.trainings.show', compact('training'));
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
        $training = Training::find($id);
        if (is_null($training)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('trainings.index');
        }
        $training_categories = TrainingCategory::where('status', 1)->get();
        return view('backend.dashboard.admin.trainings.edit', compact('training', 'training_categories'));
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

        $training = Training::find($id);
        if (is_null($training)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('trainings.index');
        }

        $request->validate([
            'title' => "required|string|unique:trainings,title,{$id},id,deleted_at,NULL",
            'training_category_id'  => 'required|integer|exists:training_categories,id,deleted_at,NULL',
            'description'  => 'nullable|string',
            'tags'  => 'nullable|string',
            'price'  => 'required|numeric',
            'discount_price'  => 'nullable|numeric',
            'image'  => 'nullable|mimes:jpg,jpeg,png,webp,svg',
        ]);

        $training->title = $request->title;
        $training->training_category_id = $request->training_category_id;
        $training->description = $request->description ?? null;
        $training->tags = $request->tags ?? null;
        $training->price = $request->price;
        $training->discount_price = $request->discount_price ?? 0;

        if (!is_null($request->image)) {
            $training->image = UploadHelper::update('image', $request->image, $request->title . '-' . time(), 'uploaded_files/images/trainings', $training->image);
        }

        $training->save();
        session()->flash('success', 'Training has been updated successfully !!');
        return redirect()->route('trainings.index');
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

        $training = Training::find($id);
        if (is_null($training)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('trainings.index');
        }
        UploadHelper::deleteFile('uploaded_files/images/trainings/' . $training->image);
        $training->delete();

        session()->flash('success', 'Training has been deleted successfully!!');
        return redirect()->route('trainings.index');
    }
}
