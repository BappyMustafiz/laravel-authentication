<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Country;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $countries = Country::with('states')->get();
        return view('auth.register', compact('countries'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'zipcode' => $request->zipcode,
            'hear_about_us' => $request->hear_about_us ?? null,
            'hear_about_us_text' => $request->hear_about_us_text ?? null,
            'feedback' => $request->feedback ?? null,
            'terms' => $request->terms ?? null,
        ]);

        $user->attachRole('user');

        event(new Registered($user));
        //send mail to admin
        event(new \App\Events\SendMail($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
