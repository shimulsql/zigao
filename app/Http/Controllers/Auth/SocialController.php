<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(Request $request, $provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();
        $user = User::where(["email" => $userSocial->getEmail()])->first();

        if ($user) {
            Auth::login($user);

            $request->session()->regenerate();

            return redirect()->intended(route('user.dashboard'));
        } else {
            session(['auth_token' => $userSocial->token, 'auth_provider' => $provider]);

            return redirect(route('register.page.social'));
        }
    }

    public function create_account()
    {

        $token = session()->get('auth_token');
        $provider = session()->get('auth_provider');

        $title = "Create accont with - " . $provider;
        $userSocial = Socialite::driver($provider)->userFromToken($token);

        return view('auth.social.register', ['title' => $title, 'user' => $userSocial, 'provider' => $provider]);
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:20',
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $userSocial = Socialite::driver($request->session()->get('auth_provider'))->userFromToken($request->session()->get('auth_token'));

        $user = User::create([
            'name' => $request->name,
            'email' => $userSocial->getEmail(),
            'avatar' => $userSocial->getAvatar(),
            'provider' => $request->session()->get('auth_provider'),
            'provider_id' => $userSocial->id,
            'email_verified_at' => now(),
        ]);

        $user->markEmailAsVerified();

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended(route('user.dashboard'));
    }
}
