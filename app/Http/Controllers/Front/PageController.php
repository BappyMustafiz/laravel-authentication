<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\HowItWorkContent;
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
        $top_section = HowItWorkContent::where('section_title', 'top_section')->first();
        $step_one = HowItWorkContent::where('section_title', 'step_one')->first();
        $step_two = HowItWorkContent::where('section_title', 'step_two')->first();
        $step_three = HowItWorkContent::where('section_title', 'step_three')->first();
        $step_four = HowItWorkContent::where('section_title', 'step_four')->first();
        $bottom_section = HowItWorkContent::where('section_title', 'bottom_section')->first();
        return view('frontend.pages.how-it-works', compact('top_section', 'step_one', 'step_two', 'step_three', 'step_four', 'bottom_section'));
    }

    public function features()
    {
        return view('frontend.pages.features');
    }

    public function productTeam()
    {
        return view('frontend.pages.teams.product_team');
    }

    public function designTeam()
    {
        return view('frontend.pages.teams.design_team');
    }

    public function agileTeam()
    {
        return view('frontend.pages.teams.agile_team');
    }

    public function faq()
    {
        return view('frontend.pages.faq');
    }

    public function support()
    {
        return view('frontend.pages.support');
    }
    
    public function examples()
    {
        return view('frontend.pages.examples');
    }
}
