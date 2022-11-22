<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $title = "Homepage";

        if (Auth::check()) {
            return view('front.home', ['title' => $title]);
        } else {
            return view('front.home-guest', ['title' => $title]);
        }
    }
}
