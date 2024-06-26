<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
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

    Route::post ('/', [IdeaController::class , 'store'])->name('store'); //this creates a new idea, and gives it a name

    Route::get('/{idea}', [IdeaController::class , 'show'])->name('show');
    Route::group(['middleware'=>['auth']], function(){
        Route::get('/{idea}/edit', [IdeaController::class, 'edit'])->name('edit');

        Route::put('/{idea}', [IdeaController::class, 'update'])->name('update');

        Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');

        Route::post('/{idea}/comments', [CommentController::class , 'store'] )->name('comments.store')->middleware('auth');
    });

});


Route::get('/terms', function(){
    return view('terms');
});




