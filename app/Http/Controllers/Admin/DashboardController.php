<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Country;
use App\Models\CustomerQuery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }

    public function dashboard()
    {
        if ($this->user->hasRole('admin')) {
            return view('backend.dashboard.admin.dashboard');
        }
    }

    public function profilePage()
    {
        if (is_null($this->user) || !$this->user->hasRole(['admin', 'user'])) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }
        $userData = $this->user;
        $countries = Country::with('states')->get();
        return view('backend.dashboard.common.profiles.index', compact('userData', 'countries'));
    }

    public function updateAdminDetails(UserUpdateRequest $request)
    {
        if (is_null($this->user) || !$this->user->hasRole(['admin'])) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

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

    public function updateAdminPassword(PasswordUpdateRequest $request)
    {
        if (is_null($this->user) || !$this->user->hasRole(['admin'])) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (Hash::check($request->old_password, $this->user->password)) {
            $user = User::find($this->user->id);
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(['success' => true, 'message' => 'Password has been updated successfully !!'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Old Password is incorrect !!'], 200);
        }
    }


    public function uploadAdminProfileMedia(Request $request)
    {
        if (is_null($this->user) || !$this->user->hasRole(['admin', 'user'])) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $urls = [];
        foreach ($request->images as $image) {
            array_push($urls, temporaryImageUpload($image));
        }
        return response()->json(['success' => true, 'urls' => $urls]);
    }

    public function removeAdminProfileMedia(Request $request)
    {
        if (is_null($this->user) || !$this->user->hasRole(['admin', 'user'])) {
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
    public function adminProfileMediaUpload(Request $request)
    {
        if (is_null($this->user) || !$this->user->hasRole(['admin', 'user'])) {
            return abort(403, 'You are not allowed to access this page !');
        }
        $itemInputImages = json_decode($request->profileImage, true);
        $user = User::find($this->user->id);

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

    public function customerQueries()
    {

        if (is_null($this->user) || !$this->user->hasRole('admin')) {
            $message = 'You are not allowed to access this page !';
            return view('errors.403', compact('message'));
        }

        if (request()->ajax()) {

            $queries = CustomerQuery::with('user')->orderBy('created_at', 'desc')->get();
            $datatable = DataTables::of($queries)
                ->addIndexColumn()
                ->editColumn('title', function ($row) {
                    return $row->title;
                })
                ->editColumn('content', function ($row) {
                    return $row->content;
                })
                ->editColumn('created_by', function ($row) {
                    return $row->user ? ($row->user->first_name . ' ' . $row->user->last_name) : '';
                });
            $rawColumns = ['title', 'content', 'created_by', 'email', 'phone'];
            return $datatable->rawColumns($rawColumns)
                ->make(true);
        }
        return view('backend.dashboard.admin.queries.index');
    }
}
