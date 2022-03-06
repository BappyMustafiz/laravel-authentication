<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\TrainingCategory;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function pricing()
    {
        $categories = TrainingCategory::whereHas('trainings')->with('trainings')->where('status', 1)->get();
        // dd($categories->toArray());
        return view('frontend.pages.pricing', compact('categories'));
    }
    public function howItWorks()
    {
        return view('frontend.pages.how-it-works');
    }
}
