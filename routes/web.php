<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/',[HomeController::class,'index'])->name('home');

Route::resources([
    'posts'=>'PostController',
    'users'=>'UserController',
    'comments'=>'CommentController',
    'tags'=>'TagController'
]);

Route::get('/profile','ProfileController@index')->name('profile');
Route::get('/posts','PostController@index')->name('posts');
Route::get('/admin/posts', 'PostController@view')->name('posts-admin');
Route::get('/admin/tags', 'TagController@index')->name('tags-admin');
Route::get('/admin','ProfileController@admin')->name('admin')->middleware(['auth','role:admin']);
Route::get('/posts/{post}/comments', 'CommentController@index')->name('comments.index');
Route::get('/posts/{post}/comments/create', 'CommentController@create')->name('comments.create');
Route::get('/posts/{post}/comments/{comment}/edit', 'CommentController@edit')->name('comments.edit');
Auth::routes();

Route::post('/posts/search',[PostController::class,'fetch'])->name('post.search');



