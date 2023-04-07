<?php

use App\Mail\TestMail;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\QuestionController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\User\Dashboard\DashboardController as UDashboard;
use Illuminate\Support\Facades\Crypt;

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

Route::get('/', [HomeController::class, 'home'])->name('homepage');


/**
 * -----------------------
 *    Question Routes    |
 * -----------------------
 */

Route::middleware('auth')->group(function () {
    Route::resource('question', QuestionController::class);
});


/**
 * Authenticated User Routes
 */

Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('dashboard', [UDashboard::class, 'index'])->name('dashboard');
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


    /**
     * Social Logins
     */

    Route::get('oauth/{provider}', [SocialController::class, 'redirect'])->name('login.social');
    Route::get('oauth/{provider}/callback', [SocialController::class, 'callback']);

    // Social Create Account
    Route::get('social-create-account', [SocialController::class, 'create_account'])->name('register.page.social');
    Route::post('social-create-account', [SocialController::class, 'register'])->name('register.social');
});

// user logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');



// email verification
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect(route('dashboard'));
})->middleware(['auth'])->name('verification.verify');


// test
Route::get('test', function () {

});
