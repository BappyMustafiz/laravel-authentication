<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\UploadHelper;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Testimonial;


class TestimonialController extends Controller
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
            $testimonials = Testimonial::orderBy('id', 'desc')->get();

            $datatable = DataTables::of($testimonials)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $deleteRoute =  route('testimonials.destroy', [$row->id]);
                        $html = '<a class="btn waves-effect waves-light btn-success btn-sm-custom ml-1" title="Edit Testimonial Details" href="' . route('testimonials.edit', $row->id) . '"><i class="icofont icofont-edit"></i></a>';
                        $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm-custom ml-1 text-white" title="Delete Item" id="deleteItem' . $row->id . '"><i class="icofont icofont-trash"></i></a>';

                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Testimonial will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
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
                ->editColumn('user_name', function ($row) {
                    return $row->user_name;
                })
                ->editColumn('designation', function ($row) {
                    return $row->designation;
                })
                ->editColumn('user_image', function ($row) {
                    if ($row->user_image != null) {
                        return "<img src='" . asset('uploaded_files/images/testimonials/' . $row->user_image) . "' width='60' height='40'/>";
                    }
                    return '-';
                });
            $rawColumns = ['action', 'title', 'user_name', 'designation', 'user_image'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }
        return view('backend.dashboard.admin.testimonials.index');
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
        return view('backend.dashboard.admin.testimonials.create');
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
            'title'  => 'required|string',
            'user_name'  => 'required|string',
            'designation'  => 'required|string',
            'user_image'  => 'nullable|mimes:jpg,jpeg,png,webp,svg',
        ]);

        $testimonial = new Testimonial();
        $testimonial->title = $request->title;
        $testimonial->user_name = $request->user_name;
        $testimonial->designation = $request->designation;

        if (!is_null($request->user_image)) {
            $testimonial->user_image = UploadHelper::upload('image', $request->user_image, $request->title . '-' . time(), 'uploaded_files/images/testimonials');
        }
        $testimonial->save();

        session()->flash('success', 'New Testimonial has been created successfully !!');
        return redirect()->route('testimonials.index');
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
        $testimonial = Testimonial::find($id);
        if (is_null($testimonial)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('testimonials.index');
        }
        return view('backend.dashboard.admin.testimonials.edit', compact('testimonial'));
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

        $testimonial = Testimonial::find($id);
        if (is_null($testimonial)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('testimonials.index');
        }

        $request->validate([
            'title'  => 'required|string',
            'user_name'  => 'required|string',
            'designation'  => 'required|string',
            'user_image'  => 'nullable|mimes:jpg,jpeg,png,webp,svg',
        ]);

        $testimonial->title = $request->title;
        $testimonial->user_name = $request->user_name;
        $testimonial->designation = $request->designation;

        if (!is_null($request->user_image)) {
            $testimonial->user_image = UploadHelper::update('image', $request->user_image, $request->title . '-' . time(), 'uploaded_files/images/testimonials', $testimonial->user_image);
        }

        $testimonial->save();
        session()->flash('success', 'Testimonial has been updated successfully !!');
        return redirect()->route('testimonials.index');
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

        $testimonial = Testimonial::find($id);
        if (is_null($testimonial)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('testimonials.index');
        }
        UploadHelper::deleteFile('uploaded_files/images/testimonials/' . $testimonial->user_image);
        $testimonial->delete();

        session()->flash('success', 'Testimonial has been deleted successfully!!');
        return redirect()->route('testimonials.index');
    }
}
