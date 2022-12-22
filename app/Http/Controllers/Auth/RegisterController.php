<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function index()
    {
        $title = 'Signup | ' . env('APP_NAME');

        return view('auth.register', ['title' => $title]);
    }

    public function register(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirm' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        // create user
        $user = User::create($request->all());

        // generate token 
        // token will be generated through 
        $user->token = $user->id;
        $user->save();

        event(new Registered($user));

        // redirect to login page
        return redirect()->route('login.page')->with('success', 'Successfully signed up');
    }
}
