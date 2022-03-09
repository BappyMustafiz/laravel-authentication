<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SettingController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    public function settingPage()
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        $settingData = Setting::first();
        return view('backend.dashboard.admin.settings.settings', compact('settingData'));
    }

    public function uploadLogoMedia(Request $request)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $urls = [];
        foreach ($request->images as $image) {
            array_push($urls, temporaryImageUpload($image));
        }
        return response()->json(['success' => true, 'urls' => $urls]);
    }

    public function removeLogoMedia(Request $request)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        if ($request->fromStorage == true) {
            $originalImagePath = str_replace('/t/', '/o/', $request->image);
            imageDelete($originalImagePath);
            $listImagePath = str_replace('/t/', '/l/', $request->image);
            imageDelete($listImagePath);
            return response()->json(['success' => imageDelete($request->image)]);
        } else {
            return response()->json(['success' => removeTemporaryImage($request->image)]);
        }
    }
    public function logoMediaUpload(Request $request)
    {
        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $itemInputImages = json_decode($request->profileImage, true);
        $setting = Setting::first();
        if (!$setting) {
            $setting  = Setting::create([
                'site_logo' => null
            ]);
        }
        if ($itemInputImages && $itemInputImages[0]['image']) {
            $mediaImage = imageMove($itemInputImages[0]['image'], $folderName = 'siteLogo', $imageStoreTypes = ['originalSize']);
            $originalSize = $mediaImage['originalSize'];

            $setting->site_logo = $originalSize;
            $setting->save();
            return response()->json(['success' => true, 'message' => 'Logo uploaded successfully !!'], 200);
        } else {
            $setting->site_logo = null;
            $setting->save();
            return response()->json(['success' => true, 'message' => 'Logo uploaded successfully !!'], 200);
        }
    }

    public function compose(View $view)
    {
        $setting = Setting::first();
        $view->with('site_logo', ($setting && $setting->site_logo ? asset($setting->site_logo) : ''));
    } 
}
