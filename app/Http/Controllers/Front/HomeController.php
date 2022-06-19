<?php

namespace App\Http\Controllers\Front;

use App\Models\Brand;
use App\Models\HomeContent;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $top_section = HomeContent::where('section_title', 'top_section')->first();
        $brand_section = HomeContent::where('section_title', 'brand_section')->first();
        $brandList = Brand::all();
        $section_two = HomeContent::where('section_title', 'section_two')->first();
        $section_three = HomeContent::where('section_title', 'section_three')->first();
        $section_four = HomeContent::where('section_title', 'section_four')->first();
        $testimonials = Testimonial::get();
        return view('frontend.pages.home', compact('top_section', 'brand_section', 'brandList', 'section_two', 'section_three', 'section_four', 'testimonials'));
    }
}
