<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\Video;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class VideoController extends Controller
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
            $videos = Video::orderBy('id', 'desc')->get();

            $datatable = DataTables::of($videos)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $html = '<a class="btn waves-effect waves-light btn-primary btn-sm-custom" title="View Video Details" href="' . route('videos.show', $row->id) . '"><i class="icofont icofont-eye-alt"></i></a>';
                        $deleteRoute =  route('videos.destroy', [$row->id]);
                        $html .= '<a class="btn waves-effect waves-light btn-success btn-sm-custom ml-1" title="Edit Video Details" href="' . route('videos.edit', $row->id) . '"><i class="icofont icofont-edit"></i></a>';
                        $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm-custom ml-1 text-white" title="Delete Item" id="deleteItem' . $row->id . '"><i class="icofont icofont-trash"></i></a>';

                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Video will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
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
                ->editColumn('training_id', function ($row) {
                    return $row->training ? $row->training->title : '';
                })
                ->editColumn('image', function ($row) {
                    if ($row->image != null) {
                        return "<img src='" . asset('uploaded_files/images/trainings/' . $row->image) . "' width='60' height='40'/>";
                    }
                    return '-';
                });
            $rawColumns = ['action', 'title', 'training_id', 'image'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }
        return view('backend.dashboard.admin.videos.index');
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
        $trainings = Training::get();
        return view('backend.dashboard.admin.videos.create', compact('trainings'));
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
            'title'  => 'required|string|unique:videos,title,NULL,id,deleted_at,NULL',
            'short_description'  => 'required|string',
            'training_id'  => 'required|integer|exists:trainings,id,deleted_at,NULL',
            'video'  => 'required',
            'image'  => 'required|mimes:jpg,jpeg,png,webp,svg',
        ]);

        $video = new Video();
        $video->title = $request->title;
        $video->short_description = $request->short_description;
        $video->training_id = $request->training_id;

        if (!is_null($request->video)) {
            $video->video = UploadHelper::upload('image', $request->video, $request->title . '-' . time(), 'uploaded_files/videos/trainings');
        }

        if (!is_null($request->image)) {
            $video->image = UploadHelper::upload('image', $request->image, $request->title . '-' . time(), 'uploaded_files/images/trainings');
        }
        $video->save();

        session()->flash('success', 'New Video has been uploaded successfully !!');
        return redirect()->route('videos.index');
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
        $video = Video::find($id);
        if (is_null($video)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('videos.index');
        }
        return view('backend.dashboard.admin.videos.show', compact('video'));
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
        $video = Video::find($id);
        if (is_null($video)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('videos.index');
        }
        $trainings = Training::get();
        return view('backend.dashboard.admin.videos.edit', compact('video', 'trainings'));
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

        $video = Video::find($id);
        if (is_null($video)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('videos.index');
        }

        $request->validate([
            'title' => "required|string|unique:videos,title,{$id},id,deleted_at,NULL",
            'short_description'  => 'required|string',
            'training_id'  => 'required|integer|exists:trainings,id,deleted_at,NULL',
            'video'  => 'nullable',
            'image'  => 'nullable|mimes:jpg,jpeg,png,webp,svg',
        ]);
        $video->title = $request->title;
        $video->short_description = $request->short_description;
        $video->training_id = $request->training_id;

        if (!is_null($request->video) && !is_numeric($request->video)) {
            $video->video = UploadHelper::update('image', $request->video, $request->title . '-' . time(), 'uploaded_files/videos/trainings', $video->video);
        }

        if (!is_null($request->image) && !is_numeric($request->image)) {
            $video->image = UploadHelper::update('image', $request->image, $request->title . '-' . time(), 'uploaded_files/images/trainings', $video->image);
        }

        $video->save();
        session()->flash('success', 'Video has been updated successfully !!');
        return redirect()->route('videos.index');
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

        $video = Video::find($id);
        if (is_null($video)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('videos.index');
        }
        UploadHelper::deleteFile('uploaded_files/videos/trainings/' . $video->video);
        UploadHelper::deleteFile('uploaded_files/images/trainings/' . $video->image);
        $video->delete();

        session()->flash('success', 'Video has been deleted successfully!!');
        return redirect()->route('videos.index');
    }
}
