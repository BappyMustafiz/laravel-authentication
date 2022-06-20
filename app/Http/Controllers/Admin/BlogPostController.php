<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Helpers\UploadHelper;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class BlogPostController extends Controller
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
            $blogPost = BlogPost::orderBy('id', 'desc')->get();

            $datatable = DataTables::of($blogPost)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $method_put = "" . method_field("put") . "";
                        $html = '<a class="btn waves-effect waves-light btn-primary btn-sm-custom" title="View Blog Details" href="' . route('blog-post.show', $row->id) . '"><i class="icofont icofont-eye-alt"></i></a>';
                        $deleteRoute =  route('blog-post.destroy', [$row->id]);
                        $html .= '<a class="btn waves-effect waves-light btn-success btn-sm-custom ml-1" title="Edit Blog Details" href="' . route('blog-post.edit', $row->id) . '"><i class="icofont icofont-edit"></i></a>';
                        $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm-custom ml-1 text-white" title="Delete Item" id="deleteItem' . $row->id . '"><i class="icofont icofont-trash"></i></a>';

                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Blog post will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
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
                ->editColumn('category_id', function ($row) {
                    return $row->categories ? $row->categories->name : '';
                })
                ->editColumn('image', function ($row) {
                    if ($row->image != null) {
                        return "<img src='" . asset('uploaded_files/images/blog_post/' . $row->image) . "' width='60' height='40'/>";
                    }
                    return '-';
                });
            $rawColumns = ['action', 'title', 'category_id', 'image'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }
        return view('backend.dashboard.admin.blog_post.index');
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $blogCategories = BlogCategory::where('status', 1)->get();

        return view('backend.dashboard.admin.blog_post.create', compact('blogCategories'));
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $request->validate([
            'title' => 'required',
            'post_description' => 'required',
            'category_id' => 'required',
        ]);

        $title = $request->post_title;
        $string = utf8_encode($title);
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $string = preg_replace('/[^a-z0-9- ]/i', '', $string);
        $string = str_replace(' ', '-', $string);
        $string = trim($string, '-');
        $slug = strtolower($string);

        $slugCheck = BlogPost::where('slug', $slug)->first();

        if ( $slugCheck != null ) {
            $duplicateNameCounter = BlogPost::where('title', $title)->count();
            $slug .= '-' . ($duplicateNameCounter + 1);
        }

        $blogPost = new BlogPost;
        $blogPost->status = $request->status;
        $blogPost->title = $request->title;
        $blogPost->description = $request->post_description;
        $blogPost->tags = $request->tags;
        $blogPost->category_id = $request->category_id;
        $blogPost->slug = $slug;

        if (!is_null($request->image)) {
            $blogPost->image = UploadHelper::upload('image', $request->image, 'blog_post' . '-' . time(), 'uploaded_files/images/blog_post');
        }

        $blogPost->save();

        session()->flash('success', 'New Blog Post has been created successfully !!');
        return redirect()->route('blog-post.index');
    }

    public function show($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $blogPost = BlogPost::find($id);

        if (is_null($blogPost)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('blog-post.index');
        }
        return view('backend.dashboard.admin.blog_post.show', compact('blogPost'));
    }

    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $blogPost = BlogPost::find($id);

        if (is_null($blogPost)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('blog-post.index');
        }

        $blogCategories = BlogCategory::where('status', 1)->get();

        return view('backend.dashboard.admin.blog_post.edit', compact('blogPost', 'blogCategories'));
    }

    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $request->validate([
            'title' => 'required',
            'post_description' => 'required',
            'category_id' => 'required',
        ]);

        $blogPost = BlogPost::find($id);
        $blogPost->status = $request->status;
        $blogPost->title = $request->title;
        $blogPost->description = $request->post_description;
        $blogPost->tags = $request->post_tags;
        $blogPost->category_id = $request->category_id;

        if (!is_null($request->image)) {
            $blogPost->image = UploadHelper::update('image', $request->image, 'blog_post' . '-' . time(), 'uploaded_files/images/blog_post', $blogPost->image);
        }

        $blogPost->save();

        session()->flash('success', 'Blog Post has been updated successfully !!');
        return redirect()->route('blog-post.index');
    }

    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $blogPost = BlogPost::find($id);

        if (is_null($blogPost)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('blog-post.index');
        }
        UploadHelper::deleteFile('uploaded_files/images/blog_post/' . $blogPost->image);
        $blogPost->delete();

        session()->flash('success', 'Blog Post has been deleted successfully!!');
        return redirect()->route('blog-post.index');
    }
}
