<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use App\Models\Training;
use App\Models\UserTraining;
use App\Models\Video;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userDashboard()
    {
        $trainings = UserTraining::with('training', 'training.videos', 'trainingExam', 'trainingExam.questions')->where('user_id', auth()->user()->id)->get();
        
        return view('frontend.users.dashboard', compact('trainings'));
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
}
