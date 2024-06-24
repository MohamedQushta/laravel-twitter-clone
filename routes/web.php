<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdeaController;
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

Route::get('/', [DashboardController::class , 'index'])->name('dashboard'); //this accesses the index function in the dashboard controller


Route::post ('/idea', [IdeaController::class , 'store'])->name('idea.create'); //this creates a new idea, and gives it a name
Route::get('/terms', function(){
    return view('terms');
});

