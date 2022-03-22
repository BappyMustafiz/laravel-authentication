<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Training;
use App\Models\TrainingExam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TrainingExamController extends Controller
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
            $training_exams = TrainingExam::orderBy('id', 'desc')->get();

            $datatable = DataTables::of($training_exams)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $deleteRoute =  route('training-exams.destroy', [$row->id]);
                        $html = '<a class="btn waves-effect waves-light btn-success btn-sm-custom ml-1" title="Edit Training Exam Details" href="' . route('training-exams.edit', $row->id) . '"><i class="icofont icofont-edit"></i></a>';
                        $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm-custom ml-1 text-white" title="Delete Item" id="deleteItem' . $row->id . '"><i class="icofont icofont-trash"></i></a>';

                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Training Exam will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
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

                ->editColumn('training_id', function ($row) {
                    return $row->training ? $row->training->title : '';
                })
                ->editColumn('test_title', function ($row) {
                    return $row->test_title;
                })
                ->editColumn('time_limit', function ($row) {
                    return $row->time_limit;
                })
                ->editColumn('number_of_question', function ($row) {
                    return $row->number_of_question;
                })
                ->editColumn('marks_per_question', function ($row) {
                    return $row->marks_per_question;
                });
            $rawColumns = ['action', 'training_id', 'test_title', 'time_limit', 'number_of_question', 'marks_per_question'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }
        return view('backend.dashboard.admin.training_exams.index');
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
        return view('backend.dashboard.admin.training_exams.create', compact('trainings'));
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
            'test_title'  => 'required|string|unique:training_exams,test_title,NULL,id,deleted_at,NULL',
            'training_id'  => 'required|integer|exists:trainings,id,deleted_at,NULL',
            'marks_per_question'  => 'nullable|numeric',
        ]);

        $training_exam = new TrainingExam();
        $training_exam->test_title = $request->test_title;
        $training_exam->training_id = $request->training_id;
        $training_exam->start_period = $request->start_period ?? null;
        $training_exam->end_period = $request->end_period ?? null;
        $training_exam->time_limit = $request->time_limit ?? null;
        $training_exam->number_of_question = $request->number_of_question ?? null;
        $training_exam->marks_per_question = $request->marks_per_question ?? null;
        $training_exam->exam_type = $request->exam_type ?? null;

        $training_exam->save();

        session()->flash('success', 'New Training Exam has been uploaded successfully !!');
        return redirect()->route('training-exams.index');
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
        $training_exam = TrainingExam::find($id);
        if (is_null($training_exam)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('training-exams.index');
        }
        $trainings = Training::get();
        return view('backend.dashboard.admin.training_exams.edit', compact('training_exam', 'trainings'));
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

        $training_exam = TrainingExam::find($id);
        if (is_null($training_exam)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('training-exams.index');
        }

        $request->validate([
            'test_title' => "required|string|unique:training_exams,test_title,{$id},id,deleted_at,NULL",
            'training_id'  => 'required|integer|exists:trainings,id,deleted_at,NULL',
        ]);
        $training_exam->test_title = $request->test_title;
        $training_exam->training_id = $request->training_id;
        $training_exam->start_period = $request->start_period ?? null;
        $training_exam->end_period = $request->end_period ?? null;
        $training_exam->time_limit = $request->time_limit ?? null;
        $training_exam->number_of_question = $request->number_of_question ?? null;
        $training_exam->marks_per_question = $request->marks_per_question ?? null;
        $training_exam->exam_type = $request->exam_type ?? null;

        $training_exam->save();
        session()->flash('success', 'Training Exam has been updated successfully !!');
        return redirect()->route('training-exams.index');
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

        $training_exam = TrainingExam::find($id);
        if (is_null($training_exam)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('training-exams.index');
        }
        $training_exam->delete();

        session()->flash('success', 'Training Exam has been deleted successfully!!');
        return redirect()->route('training-exams.index');
    }
}
