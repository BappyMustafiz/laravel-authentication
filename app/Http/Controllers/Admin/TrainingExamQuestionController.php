<?php

namespace App\Http\Controllers\Admin;

use App\Models\TrainingExam;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\TrainingExamQuestion;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class TrainingExamQuestionController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    
    public function index($isTrashed = false)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {
            $trainingExamQuestions = TrainingExamQuestion::orderBy('id', 'desc')->get();

            $datatable = DataTables::of($trainingExamQuestions)
                ->addIndexColumn()
                ->addColumn(
                    'action',
                    function ($row) {
                        $csrf = "" . csrf_field() . "";
                        $method_delete = "" . method_field("delete") . "";
                        $deleteRoute =  route('training-exam-question.destroy', [$row->id]);
                        $html = '<a class="btn waves-effect waves-light btn-success btn-sm-custom ml-1" title="Edit Training Exam Details" href="' . route('training-exam-question.edit', $row->id) . '"><i class="icofont icofont-edit"></i></a>';
                        $html .= '<a class="btn waves-effect waves-light btn-danger btn-sm-custom ml-1 text-white" title="Delete Item" id="deleteItem' . $row->id . '"><i class="icofont icofont-trash"></i></a>';

                        $html .= '<script>
                            $("#deleteItem' . $row->id . '").click(function(){
                                swal.fire({ title: "Are you sure?",text: "Training Exam Question will be deleted !",type: "warning",showCancelButton: true,confirmButtonColor: "#DD6B55",confirmButtonText: "Yes, delete it!"
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
                ->editColumn('training_exam_id', function ($row) {
                    return $row->exam ? $row->exam->test_title : '';
                })
                ->editColumn('question_type', function ($row) {
                    if($row->question_type = 2){
                        return 'Multiple choice';
                    }else{
                        return '';
                    }
                });
                
            $rawColumns = ['action', 'training_exam_id', 'question_type', 'difficulty', 'exam_title'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }
        return view('backend.dashboard.admin.training_exam_question.index');
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $trainingExams = TrainingExam::get();
        return view('backend.dashboard.admin.training_exam_question.create', compact('trainingExams'));
    }

    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            return abort(403, 'You are not allowed to access this page !');
        }

        $rules = [
            'question_title'  => 'required|string|unique:training_exam_questions,exam_title,NULL,id,deleted_at,NULL',
            'exam_id'  => 'required|integer|exists:training_exams,id,deleted_at,NULL',
            'question_type'  => 'required|numeric',
            'mcq1'  => 'required',
            'mcq2'  => 'required',
            'mcq3'  => 'required',
            'mcq4'  => 'required',
            'mcq5'  => 'nullable',
            'answer'  => [
                'required',
                Rule::in($request->mcq1, $request->mcq1, $request->mcq3, $request->mcq4, $request->mcq5)
            ]
        ];
        
        $messages = [
            'required'  => 'The :attribute field is required.',
            'answer.required'  => 'The :attribute field must be similiar to question field',
        ];

        $request->validate($rules,$messages);

        $examQuestion = new TrainingExamQuestion;
        $examQuestion->exam_title = $request->question_title;
        $examQuestion->training_exam_id = $request->exam_id;
        $examQuestion->question_type = $request->question_type;
        $examQuestion->mcq1 = $request->mcq1;
        $examQuestion->mcq2 = $request->mcq2;
        $examQuestion->mcq3 = $request->mcq3;
        $examQuestion->mcq4 = $request->mcq4;
        $examQuestion->mcq5 = $request->mcq5;
        $examQuestion->answer = $request->answer;
        $examQuestion->save();

        session()->flash('success', 'New Exam Question has been Saved successfully !!');
        return redirect()->route('training-exam-question.index');
    }
 
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $trainingExamQuestion = TrainingExamQuestion::find($id);
        if (is_null($trainingExamQuestion)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('training-exam-question.index');
        }
        $trainingExams = TrainingExam::get();
        return view('backend.dashboard.admin.training_exam_question.edit', compact('trainingExamQuestion', 'trainingExams'));
    }


    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $examQuestion = TrainingExamQuestion::find($id);
        if (is_null($examQuestion)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('training-exam-question.index');
        }

        $rules = [
            'question_title'  => "required|string|unique:training_exam_questions,exam_title,{$id},id,deleted_at,NULL",
            'exam_id'  => 'required|integer|exists:training_exams,id,deleted_at,NULL',
            'question_type'  => 'required|numeric',
            'mcq1'  => 'required',
            'mcq2'  => 'required',
            'mcq3'  => 'required',
            'mcq4'  => 'required',
            'mcq5'  => 'nullable',
            'answer'  => [
                'required',
                Rule::in($request->mcq1, $request->mcq1, $request->mcq3, $request->mcq4, $request->mcq5)
            ]
        ];
        
        $messages = [
            'required'  => 'The :attribute field is required.',
            'answer.required'  => 'The :attribute field must be similiar to question field',
        ];

        $request->validate($rules,$messages);

        $examQuestion->exam_title = $request->question_title;
        $examQuestion->training_exam_id = $request->exam_id;
        $examQuestion->question_type = $request->question_type;
        $examQuestion->mcq1 = $request->mcq1;
        $examQuestion->mcq2 = $request->mcq2;
        $examQuestion->mcq3 = $request->mcq3;
        $examQuestion->mcq4 = $request->mcq4;
        $examQuestion->mcq5 = $request->mcq5;
        $examQuestion->answer = $request->answer;
        $examQuestion->save();

        session()->flash('success', 'Exam Questions has been updated successfully !!');
        return redirect()->route('training-exam-question.index');
    }

    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $examQuestion = TrainingExamQuestion::find($id);
        if (is_null($examQuestion)) {
            session()->flash('error', "The page is not found !");
            return redirect()->route('training-exam-question.index');
        }
        $examQuestion->delete();

        session()->flash('success', 'Exam Question has been deleted successfully!!');
        return redirect()->route('training-exam-question.index');
    }
}
