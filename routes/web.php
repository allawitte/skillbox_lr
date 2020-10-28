<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FeedbacksController;

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

Route::get('/', function(){
    return redirect()->route('posts.index');
});
Route::resource('posts', PostsController::class);

Route::post('/admin/feedbacks/store', [FeedbacksController::class, 'store'])->name('feedbacks.store');
Route::get('/admin/feedbacks', [FeedbacksController::class, 'index'])->name('feedbacks');

Route::get('/about', function(){
    return view('about');
})->name('about');
Route::get('/contacts', function(){
    return view('contacts');
})->name('contacts');