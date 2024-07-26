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

Route::group(['prefix' => '/admin-panel'], function(){

    Route::get('',function(){
        return view('Admin/admin-panel');    
    });   

    Route::get('/admin-about-list',[AboutController::class,'aboutlist']);

    Route::get('/admin-about-create',function(){
        return view('Admin/admin-about-create');
    });

    Route::get('/admin-about-edit/{id}',[AboutController::class,'aboutedit'])->name('about-edit') ;

    Route::post('/admin-about-create',[AboutController::class,'createabout']);

    Route::post('/admin-about-edit/{id}',[AboutController::class,'updateabout']);

    Route::delete('/admin-about-list/{id}',[AboutController::class,'deleteabout'])->name('about-delete');

    Route::get('/admin-about-list/{id}',[AboutController::class,'activateselectedabout'])->name('activate-about');

    Route::get('/admin-blogs-create',[BlogController::class,'getcategories']);

    Route::post('/admin-blogs-create',[BlogController::class,'createblog']);

    Route::get('/admin-blogs-list',[BlogController::class,'listblog']);

    Route::get('/admin-blogs-edit/{id}',[BlogController::class,'editblogs'])->name('blogs-edit');

    Route::post('/admin-blogs-edit/{id}',[BlogController::class,'updateblog']);

    Route::delete('/admin-blogs-list/{id}',[BlogController::class,'deleteblog'])->name('blogs-delete');

    Route::get('/admin-contact-list',[ContactController::class, 'listContact']);

    Route::delete('/admin-contact-list/{id}',[ContactController::class,'deletecontact'])->name('contact-delete');

    Route::get('/admin-contact-edit/{id}',[ContactController::class,'editcontact'])->name('contact-edit');

    Route::post('/admin-contact-edit/{id}',[ContactController::class,'updateContact']);
});

