<?php

namespace App\Http\Controllers\Front;

use App\Models\Video;
use App\Models\Training;
use App\Models\HomeContent;
use App\Models\TrainingExam;
use App\Models\UserTraining;
use Illuminate\Http\Request;
use App\Models\TrainingExamAnswer;
use App\Http\Controllers\Controller;
use App\Models\TrainingExamQuestion;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userDashboard()
    {
        $trainings = UserTraining::with('training', 'training.videos', 'trainingExam', 'trainingExam.questions')->where('user_id', auth()->user()->id)->get();
        
        $trainingExamResult = TrainingExamAnswer::with('trainingExam')
                            ->where('user_id', auth()->user()->id)
                            ->groupBy('exam_number')
                            ->get();

        return view('frontend.users.dashboard', compact('trainings', 'trainingExamResult'));
    }

    public function buyCourse(Request $request)
    {
        $request->validate([
            'category' => 'required|integer|exists:training_categories,id,deleted_at,NULL',
            'courseIds' => 'nullable|array',
        ]);
        if (isset($request->courseIds) && count($request->courseIds) > 0) {
            foreach ($request->courseIds as $course) {
                $training = Training::where(['training_category_id' => $request->category, 'id' => $course])->first();
                if ($training) {
                    $check_subscription = UserTraining::where([
                        'user_id' => auth()->user()->id,
                        'training_category_id' => $request->category,
                        'training_id' => $course
                    ])->first();
                    if (!$check_subscription) {
                        UserTraining::create([
                            'user_id' => auth()->user()->id,
                            'training_id' => $course,
                            'training_category_id' => $request->category,
                        ]);
                    }
                }
            }
        } else {
            $trainings = Training::where(['training_category_id' => $request->category])->get();
            foreach ($trainings as $training) {
                $check_subscription = UserTraining::where([
                    'user_id' => auth()->user()->id,
                    'training_category_id' => $request->category,
                    'training_id' => $training->id
                ])->first();
                if (!$check_subscription) {
                    UserTraining::create([
                        'user_id' => auth()->user()->id,
                        'training_id' => $training->id,
                        'training_category_id' => $request->category,
                    ]);
                }
            }
        }
        return response()->json(['success' => true, 'message' => 'Enrolled successfully!!'], 200);
    }
    public function getVideoUrl(Request $request)
    {
        $request->validate([
            'videoId' => 'required|integer|exists:videos,id,deleted_at,NULL',
        ]);
        $video = Video::where('id', $request->videoId)->first();
        $data = [];
        if ($video) {
            $data['url'] = asset('uploaded_files/videos/trainings/' . $video->video);
        }
        return response()->json(['success' => true, 'message' => 'Video get successfully!!', 'data' => $data], 200);
    }

    public function examQuestionSubmit(Request $request){

        $rules = [
            'answer'  => 'required',
        ];

        $messages = [
            'required'  => 'Please Select a answer',
        ];

        $request->validate($rules,$messages);
        
        $arrayAnswer = $request->answer;

        $count = 1;

        $trainingExamCount = TrainingExamAnswer::where('training_exam_id', $request->exam_id)
                                                ->where('user_id', $request->user_id)
                                                ->first();

        if(!empty($trainingExamCount)){
            $count = $trainingExamCount->exam_number + 1;
        }

        foreach ($arrayAnswer as $key => $answer) {
            $question = TrainingExamQuestion::find($key);
            $exam = TrainingExam::find($request->exam_id);

            $correct = 0;
            $score = 0.0;
            if($answer == $question->answer){
                $correct = 1;
                $score = $exam->marks_per_question;
            }

            $examAnswer = new TrainingExamAnswer;
            $examAnswer->training_exam_id = $request->exam_id;
            $examAnswer->training_exam_question_id = $key;
            $examAnswer->user_id = $request->user_id;
            $examAnswer->exam_number = $count;
            $examAnswer->correct = $correct;
            $examAnswer->answer = $answer;
            $examAnswer->score = $score;
            $examAnswer->save();
        }

        $trainingExamResult['total'] = 0;

        $totalAnswer = TrainingExamAnswer::where('training_exam_id', $request->exam_id)
                                                ->where('user_id', $request->user_id)
                                                ->where('exam_number', $count)
                                                ->count();
        
        $totalCorrect = TrainingExamAnswer::where('training_exam_id', $request->exam_id)
                                                ->where('user_id', $request->user_id)
                                                ->where('exam_number', $count)
                                                ->where('correct', 1)
                                                ->sum('correct');

        $totalScore = TrainingExamAnswer::where('training_exam_id', $request->exam_id)
                                                ->where('user_id', $request->user_id)
                                                ->where('exam_number', $count)
                                                ->where('correct', 1)
                                                ->sum('score');
        $trainingExamResult['total'] = [
            'totalAnswer' => $totalAnswer,
            'totalCorrect' => $totalCorrect,
            'totalScore' => $totalScore,
        ];

        return redirect()->back()->with('examResult', $trainingExamResult);
    }

    public function printCertificate(Request $request, $id) {

        $totalScore = TrainingExamAnswer::where('exam_number', $id)
                                        ->where('correct', 1)
                                        ->sum('score');

        return view('frontend.users.certificate', compact('totalScore'));
    }
}
