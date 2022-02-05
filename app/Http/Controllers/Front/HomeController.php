<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function customerLogin()
    {
        return view('frontend.pages.customer-login');
    }

    public function customerDashboard()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $countries = Country::with('states')->get();
        return view('frontend.pages.customer-dashboard', compact('user', 'countries'));
    }

    public function updateUserDetails(UserUpdateRequest $request)
    {
        $user = User::find(auth()->user()->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->country_id = $request->country_id;
        $user->state_id = $request->state_id;
        $user->zipcode = $request->zipcode;
        $user->save();

        session()->flash('success', 'Details has been updated successfully !!');
        return redirect()->back();
    }

    public function updatePassword(PasswordUpdateRequest $request)
    {
        if (Hash::check($request->old_password, auth()->user()->password)) {
            $user = User::find(auth()->user()->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(['success' => true, 'message' => 'Password has been updated successfully !!'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Old Password is incorrect !!'], 200);
        }
    }


    public function uploadProfileMedia(Request $request)
    {
        $urls = [];
        foreach ($request->images as $image) {
            array_push($urls, temporaryImageUpload($image));
        }
        return response()->json(['success' => true, 'urls' => $urls]);
    }

    public function removeProfileMedia(Request $request)
    {
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
    public function profileMediaUpload(Request $request)
    {
        $itemInputImages = json_decode($request->profileImage, true);
        $user = User::find(auth()->user()->id);

        if ($itemInputImages && $itemInputImages[0]['image']) {
            $mediaImage = imageMove($itemInputImages[0]['image'], $folderName = 'profileImage', $imageStoreTypes = ['originalSize']);
            $originalSize = $mediaImage['originalSize'];

            $user->avatar = $originalSize;
            $user->save();
            return response()->json(['success' => true, 'message' => 'Image uploaded successfully !!'], 200);
        } else {
            $user->avatar = null;
            $user->save();
            return response()->json(['success' => true, 'message' => 'Image uploaded successfully !!'], 200);
        }
    }
}
