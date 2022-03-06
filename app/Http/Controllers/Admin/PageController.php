<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\UploadHelper;
use App\Http\Controllers\Controller;
use App\Models\HomeContent;
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
                return $this->save_or_update_top_section($request, 'top_section');
                break;
            case 'section_two':
                return $this->save_or_update_top_section($request, 'section_two');
                break;
            case 'section_three':
                return $this->save_or_update_top_section($request, 'section_three');
                break;
            case 'section_four':
                return $this->save_or_update_top_section($request, 'section_four');
                break;

            default:
                # code...
                break;
        }
    }

    public function save_or_update_top_section($request, $request_form)
    {

        try {
            DB::beginTransaction();

            $content_exist = HomeContent::where('section_title', $request_form)->first();

            if ($content_exist) {
                $content_exist->main_title = $request->main_title;
                $content_exist->sub_title = $request->sub_title;
                $content_exist->home_video_url = $request->home_video_url;
                if (!is_null($request->section_image)) {
                    $content_exist->section_image = UploadHelper::update('image', $request->section_image, $request->section_title . '-' . time(), 'uploaded_files/images/pages/home_page', $content_exist->image);
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
}
