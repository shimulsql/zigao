<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        $title = "Login";

        return view('auth.login', ['title' => $title]);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $validator->validated();

        // authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('user.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Your credenticals not matched'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
