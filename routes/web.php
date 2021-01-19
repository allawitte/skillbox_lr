<?php

use App\Http\Controllers\FeedbacksController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::resource('/posts', PostsController::class);
Route::get('/posts/tags/{tag}', [TagsController::class, 'index'])->name('posts_for_tag');
Route::post('/admin/feedbacks/store', [FeedbacksController::class, 'store'])->name('feedbacks.store');
Route::get('/admin/feedbacks', [FeedbacksController::class, 'index'])->name('feedbacks');

Route::get('/about', function () {
    return view('about');
})->name('about');
Route::get('/contacts', function () {
    return view('contacts');
})->name('contacts');

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

Auth::routes();
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
