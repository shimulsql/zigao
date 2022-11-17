<?php

use App\Mail\TestMail;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// authenticated

Route::middleware('auth')->group(function () {

    Route::get('dashboard', function () {
        echo "Dashboard";
        echo PHP_EOL;
        echo '<a href="' . route('logout') . '">Logout</a>';
    })->name('dashboard');
});

/**
 * Authentication routes
 */

Route::middleware('guest')->group(function () {
    // user registration
    Route::get('register', [RegisterController::class, 'index'])->name('register.page');
    Route::post('register', [RegisterController::class, 'register'])->name('register');

    // user login
    Route::get('login', [LoginController::class, 'index'])->name('login.page');
    Route::post('login', [LoginController::class, 'login'])->name('login');
});

// user logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// email verification
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect(route('dashboard'));
})->middleware(['auth', 'signed'])->name('verification.verify');


// test
Route::get('sendmail', function () {
    Mail::to('mrshimul000@gmail.com')->send(new TestMail);
});
