<?php

use App\Http\Controllers\Api\TagsController;
use App\Http\Controllers\Api\QuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'api'], function(){
    Route::get('/tags/search', [TagsController::class, 'search']);
});


// question routes

// save question as draft
Route::group(['middleware' => 'api', 'prefix' => 'question'], function(){
    Route::post('save-draft', [QuestionController::class, 'saveDraft']);
    Route::delete('delete-draft', [QuestionController::class, 'deleteDraft']);
});