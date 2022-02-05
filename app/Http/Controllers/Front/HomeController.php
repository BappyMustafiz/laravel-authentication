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

    public function customerDashboard()
    {
        return view('frontend.pages.customer-dashboard');
    }
}
