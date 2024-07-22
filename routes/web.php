<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SocialMediaController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomePageController;

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

Route::get('/',[HomePageController::class,'gethomepageinfo']);

Route::get('/blogs',[BlogController::class,'showallBlogs']);

Route::get('/about',[AboutController::class,'getaboutdata']);

Route::get('/contact',[ContactController::class,'getContactInfo']);

Route::get('/blog-details/{id}',[BlogController::class, 'getblogdetails'])->name('blog-details-route');

Route::get('/admin-panel',function(){
    return view('admin-panel');
});