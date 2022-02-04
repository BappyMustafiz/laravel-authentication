<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function customerLogin()
    {
        return view('frontend.pages.customer-login');
    }
    public function customerRegister()
    {
        $countries = Country::with('states')->get();
        return view('frontend.pages.customer-register', compact('countries'));
    }
}
