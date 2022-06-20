<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class BlogCategoryController extends Controller
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
            $blogCategory = BlogCategory::orderBy('id', 'desc')->get();

            $datatable = DataTables::of($blogCategory)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-primary btn-sm-custom" title="View Category Details" href="' . route('blog-category.show', $row->id) . '"><i class="icofont icofont-eye-alt"></i></a>';
                        $deleteRoute =  route('blog-category.destroy', [$row->id]);
                        $html .= '<a class="btn waves-effect waves-light btn-success btn-sm-custom ml-1" title="Edit Category Details" href="' . route('blog-category.edit', $row->id) . '"><i class="icofont icofont-edit"></i></a>';
                        $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm-custom ml-1 text-white" title="Delete Item" id="deleteItem' . $row->id . '"><i class="icofont icofont-trash"></i></a>';

                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Category will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
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
                });
            $rawColumns = ['action', 'name'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }
        return view('backend.dashboard.admin.blog_category.index');
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        return view('backend.dashboard.admin.blog_category.create');
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $request->validate([
            'name'  => 'required',
        ]);

        $categoryName = $request->name;

        $slug = str_replace('/', '-', str_replace(' ', '-', str_replace('&', '', str_replace('?', '', strtolower($categoryName)))));

        $slugCheck = BlogCategory::where('slug', $slug)->first();

        if ( $slugCheck != null ) {
            $duplicateNameCounter = BlogCategory::where('name', $categoryName)->count();
            $slug .= '-' . ($duplicateNameCounter + 1);
        }

        $sort = 1;
        $category = BlogCategory::orderBy('sort', 'desc')->first();

        if ($category)
            $sort = $category->sort + 1;

        $blogCategory = new BlogCategory();
        $blogCategory->name = $request->name;
        $blogCategory->slug = $slug;
        $blogCategory->sort = $sort;
        $blogCategory->status = 1;
        $blogCategory->save();

        session()->flash('success', 'New Category has been created successfully !!');
        return redirect()->route('blog-category.index');
    }

    public function show($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $blogCategory = BlogCategory::find($id);
        if (is_null($blogCategory)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('blog-category.index');
        }
        return view('backend.dashboard.admin.blog_category.show', compact('blogCategory'));
    }

    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $blogCategory = BlogCategory::find($id);
        if (is_null($blogCategory)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('blog-category.index');
        }

        return view('backend.dashboard.admin.blog_category.edit', compact('blogCategory'));
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $blogCategory = BlogCategory::find($id);

        if (is_null($blogCategory)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('blog-category.index');
        }

        $request->validate([
            'name' => "required|string",
        ]);

        if($blogCategory->name != $request->name){

            $categoryName = $request->name;

            $string = trim($categoryName);
            $string = preg_replace('/[^\w-]/', '', $string);
            $string = str_replace(' ', '-', $string);
            $slug = strtolower($string);

            $slugCheck = BlogCategory::where('slug', $slug)->first();

            if ( $slugCheck != null ) {
                $duplicateNameCounter = BlogCategory::where('name', $categoryName)->count();
                $slug .= '-' . ($duplicateNameCounter + 1);
            }
        }else{
            $slug = $blogCategory->slug;
        }

        $blogCategory->name = $request->name;
        $blogCategory->slug = $slug;
        $blogCategory->status = 1;
        $blogCategory->save();

        session()->flash('success', 'Category has been updated successfully !!');
        return redirect()->route('blog-category.index');
    }

    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $blogCategory = BlogCategory::find($id);

        if (is_null($blogCategory)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('blog-category.index');
        }

        $blogCategory->delete();

        session()->flash('success', 'Category has been deleted successfully!!');
        return redirect()->route('blog-category.index');
    }
}
