<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function registerForm()
    {
        return view('backend.auth.register');
    }





    public function registerSubmitForm(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password

        ]);

        return back()->with('message', 'Register Succefull');
    }

    public function loginForm()
    {
        return view('backend.auth.login');
    }


    public function loginSubmitForm(Request $request)
    {

        $credentials = $request->except('_token');
        $authentication = auth()->attempt($credentials);
        if ($authentication) {
            return to_route('admin.newPage');
        } else {
            return to_route('register.Form');
        }
    }
}