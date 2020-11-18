<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\FeedbacksController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\TestController;

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
//app()->singleton(App\Service\PushAll::class, function(){
//    return new \App\Service\PushAll('private-key');
//});


Route::get('/test', [TestController::class, 'index'])->middleware('test');

Route::get('/', function(){
return view('index');
});


//Route::get('/test', function(\App\Service\PushAll $pushAll){
//    dd(app($pushAll));
//    //dd(app('example'));
//});



Route::resource('/posts', PostsController::class)->names([
'index' => 'posts.index',
'create' => 'posts.create',
'store' => 'posts.store',
'show' => 'posts.show',
'edit' => 'posts.edit',
'update' => 'posts.update',
'destroy' => 'posts.destroy',
]);
Route::get('/posts/tags/{tag}', [TagsController::class, 'index'])->name('posts_for_tag');


Route::post('/admin/feedbacks/store', [FeedbacksController::class, 'store'])->name('feedbacks.store');
Route::get('/admin/feedbacks', [FeedbacksController::class, 'index'])->name('feedbacks');

Route::get('/about', function(){
return view('about');
})->name('about');
Route::get('/contacts', function(){
return view('contacts');
})->name('contacts');

Auth::routes();