<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }

    public function index()
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            $brands = Brand::orderBy('id', 'desc')->get();

            $datatable = DataTables::of($brands)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-primary btn-sm-custom" title="View Brand Details" href="' . route('brands.show', $row->id) . '"><i class="icofont icofont-eye-alt"></i></a>';
                        $deleteRoute =  route('brands.destroy', [$row->id]);
                        $html .= '<a class="btn waves-effect waves-light btn-success btn-sm-custom ml-1" title="Edit Training Details" href="' . route('brands.edit', $row->id) . '"><i class="icofont icofont-edit"></i></a>';
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
                ->editColumn('image', function ($row) {
                    if ($row->image != null) {
                        return "<img src='" . asset('uploaded_files/images/brands/' . $row->image) . "' width='60' height='40'/>";
                    }
                    return '-';
                });
            $rawColumns = ['action', 'title', 'image'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }
        return view('backend.dashboard.admin.brands.index');
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

        return view('backend.dashboard.admin.brands.create');
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
            'image'  => 'required|mimes:jpg,jpeg,png,webp,svg',
        ]);

        $brand = new Brand();
        $brand->title = $request->title;

        if (!is_null($request->image)) {
            $brand->image = UploadHelper::upload('image', $request->image, 'brand' . '-' . time(), 'uploaded_files/images/brands');
        }
        $brand->save();

        session()->flash('success', 'New brand has been created successfully !!');
        return redirect()->route('brands.index');
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
        $brand = Brand::find($id);
        if (is_null($brand)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('brands.index');
        }
        return view('backend.dashboard.admin.brands.show', compact('brand'));
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
        $brand = Brand::find($id);
        if (is_null($brand)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('brands.index');
        }

        return view('backend.dashboard.admin.brands.edit', compact('brand'));
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

        $brand = Brand::find($id);
        if (is_null($brand)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('brands.index');
        }

        $request->validate([
            'title' => "required|string|unique:brands,title,{$id},id,deleted_at,NULL",
            'image'  => 'nullable|mimes:jpg,jpeg,png,webp,svg',
        ]);

        $brand->title = $request->title;

        if (!is_null($request->image)) {
            $brand->image = UploadHelper::update('image', $request->image, 'brand' . '-' . time(), 'uploaded_files/images/brands', $brand->image);
        }

        $brand->save();

        session()->flash('success', 'Brand has been updated successfully !!');
        return redirect()->route('brands.index');
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

        $brand = Brand::find($id);
        if (is_null($brand)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('brands.index');
        }
        UploadHelper::deleteFile('uploaded_files/images/brands/' . $brand->image);
        $brand->delete();

        session()->flash('success', 'Brand has been deleted successfully!!');
        return redirect()->route('brands.index');
    }
}
