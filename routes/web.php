<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use App\Models\Idea;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('', [DashboardController::class , 'index'])->name('dashboard'); //this accesses the index function in the dashboard controller
Route::group(['prefix' => 'ideas/', 'as' => 'ideas.', 'middleware' => ['auth']], function () {

    Route::group(['middleware'=>['auth']], function(){

        Route::post('/{idea}/comments', [CommentController::class , 'store'] )->name('comments.store')->middleware('auth');
    });

});

Route::resource('ideas',IdeaController::class)->except(['index','create','show'])->middleware('auth');
Route::resource('ideas',IdeaController::class)->only(['show'])->middleware('auth');

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');

Route::post('users/{user}/follow',[FollowerController::class ,'follow'])->middleware('auth')->name('users.follow');
Route::post('users/{user}/unfollow',[FollowerController::class,'unfollow'])->middleware('auth')->name('users.unfollow');


Route::get('/terms', function(){
    return view('terms');
});




