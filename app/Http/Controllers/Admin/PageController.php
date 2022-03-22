<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use App\Models\HowItWorkContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function homePage()
    {
        $top_section = HomeContent::where('section_title', 'top_section')->first();
        $section_two = HomeContent::where('section_title', 'section_two')->first();
        $section_three = HomeContent::where('section_title', 'section_three')->first();
        $section_four = HomeContent::where('section_title', 'section_four')->first();
        return view('backend.dashboard.admin.pages.home.home-page', compact('top_section', 'section_two', 'section_three', 'section_four'));
    }
    public function homePagePost(Request $request)
    {
        $request->validate(
            [
                'section_title'  => 'required|string',
                'main_title'  => 'required|string',
                'sub_title'  => 'required|string',
                'section_image'  => 'nullable|mimes:jpg,jpeg,png,webp,svg',
                'section_video'  => 'nullable',
                'home_video_url'  => 'nullable|string',
            ]
        );

        switch ($request->section_title) {
            case 'top_section':
                return $this->save_or_update_home_content($request, 'top_section');
                break;
            case 'section_two':
                return $this->save_or_update_home_content($request, 'section_two');
                break;
            case 'section_three':
                return $this->save_or_update_home_content($request, 'section_three');
                break;
            case 'section_four':
                return $this->save_or_update_home_content($request, 'section_four');
                break;

            default:
                # code...
                break;
        }
    }

    public function save_or_update_home_content($request, $request_form)
    {

        try {
            DB::beginTransaction();

            $content_exist = HomeContent::where('section_title', $request_form)->first();

            if ($content_exist) {
                $content_exist->main_title = $request->main_title;
                $content_exist->sub_title = $request->sub_title;
                $content_exist->home_video_url = $request->home_video_url;
                if (!is_null($request->section_image)) {
                    $content_exist->section_image = UploadHelper::update('image', $request->section_image, $request->section_title . '-' . time(), 'uploaded_files/images/pages/home_page', $content_exist->section_image);
                }
                if (!is_null($request->section_video)) {
                    $content_exist->section_video = UploadHelper::update('image', $request->section_video, $request->section_title . '-' . time(), 'uploaded_files/videos/pages/home_page', $content_exist->section_video);
                }
                $content_exist->save();
            } else {
                $home_content = new HomeContent();
                $home_content->section_title = $request->section_title;
                $home_content->main_title = $request->main_title;
                $home_content->sub_title = $request->sub_title;
                $home_content->home_video_url = $request->home_video_url;
                if (!is_null($request->section_image)) {
                    $home_content->section_image = UploadHelper::upload('image', $request->section_image, $request->section_title . '-' . time(), 'uploaded_files/images/pages/home_page');
                }
                if (!is_null($request->section_video)) {
                    $home_content->section_video = UploadHelper::upload('image', $request->section_video, $request->section_title . '-' . time(), 'uploaded_files/videos/pages/home_page');
                }
                $home_content->save();
            }

            DB::commit();
            session()->flash('success', 'Content has been updated successfully !!');
            return redirect()->route('home_page');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }

    public function howItWorkPage()
    {
        $top_section = HowItWorkContent::where('section_title', 'top_section')->first();
        $step_one = HowItWorkContent::where('section_title', 'step_one')->first();
        $step_two = HowItWorkContent::where('section_title', 'step_two')->first();
        $step_three = HowItWorkContent::where('section_title', 'step_three')->first();
        $step_four = HowItWorkContent::where('section_title', 'step_four')->first();
        $bottom_section = HowItWorkContent::where('section_title', 'bottom_section')->first();
        return view('backend.dashboard.admin.pages.how-it-works.how-it-work-page', compact('top_section', 'step_one', 'step_two', 'step_three', 'step_four', 'bottom_section'));
    }
    public function howItWorkPagePost(Request $request)
    {
        $request->validate(
            [
                'section_title'  => 'required|string',
                'step_title'  => 'nullable|string',
                'main_title'  => 'required|string',
                'content'  => 'nullable|string',
                'section_image'  => 'nullable|mimes:jpg,jpeg,png,webp,svg',
                'section_video'  => 'nullable',
                'home_video_url'  => 'nullable|string',
            ]
        );

        switch ($request->section_title) {
            case 'top_section':
                return $this->save_or_update_how_it_work($request, 'top_section');
                break;
            case 'step_one':
                return $this->save_or_update_how_it_work($request, 'step_one');
                break;
            case 'step_two':
                return $this->save_or_update_how_it_work($request, 'step_two');
                break;
            case 'step_three':
                return $this->save_or_update_how_it_work($request, 'step_three');
                break;
            case 'step_four':
                return $this->save_or_update_how_it_work($request, 'step_four');
                break;
            case 'bottom_section':
                return $this->save_or_update_how_it_work($request, 'bottom_section');
                break;

            default:
                # code...
                break;
        }
    }

    public function save_or_update_how_it_work($request, $request_form)
    {

        try {
            DB::beginTransaction();

            $content_exist = HowItWorkContent::where('section_title', $request_form)->first();

            if ($content_exist) {
                $content_exist->step_title = $request->step_title;
                $content_exist->main_title = $request->main_title;
                $content_exist->content = $request->content;
                $content_exist->home_video_url = $request->home_video_url;
                if (!is_null($request->section_image)) {
                    $content_exist->section_image = UploadHelper::update('image', $request->section_image, $request->section_title . '-' . time(), 'uploaded_files/images/pages/how_it_work_page', $content_exist->section_image);
                }
                if (!is_null($request->section_video)) {
                    $content_exist->section_video = UploadHelper::update('image', $request->section_video, $request->section_title . '-' . time(), 'uploaded_files/videos/pages/how_it_work_page', $content_exist->section_video);
                }
                $content_exist->save();
            } else {
                $page_content = new HowItWorkContent();
                $page_content->section_title = $request->section_title;
                $page_content->step_title = $request->step_title;
                $page_content->main_title = $request->main_title;
                $page_content->content = $request->content;
                $page_content->home_video_url = $request->home_video_url;
                if (!is_null($request->section_image)) {
                    $page_content->section_image = UploadHelper::upload('image', $request->section_image, $request->section_title . '-' . time(), 'uploaded_files/images/pages/how_it_work_page');
                }
                if (!is_null($request->section_video)) {
                    $page_content->section_video = UploadHelper::upload('image', $request->section_video, $request->section_title . '-' . time(), 'uploaded_files/videos/pages/how_it_work_page');
                }
                $page_content->save();
            }

            DB::commit();
            session()->flash('success', 'Content has been updated successfully !!');
            return redirect()->route('how_it_work_page');
        } catch (\Exception $e) {
            session()->flash('sticky_error', $e->getMessage());
            DB::rollBack();
            return back();
        }
    }
}
