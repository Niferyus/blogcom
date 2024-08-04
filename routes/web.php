<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;

Route::get('/', [HomePageController::class, 'gethomepageinfo']);

Route::get('/blogs', [BlogController::class, 'showallBlogs']);

Route::get('/about', [AboutController::class, 'getaboutdata']);

Route::get('/contact', [ContactController::class, 'getContactInfo']);

Route::get('/blog-details/{id}', [BlogController::class, 'getblogdetails'])->name('blog-details-route');

Route::post('/contact', [ContactController::class, 'createmessage']);

Route::get('/admin-login', [LoginController::class, 'getloginscreen'])->name('admin-login');

Route::post('/admin-login', [LoginController::class, 'login'])->name('login');

Route::get('/admin-logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth', 'prefix' => 'admin-panel'], function() {
    Route::get('/', function() {
        return view('Admin.admin-panel');
    })->name('admin-panel');

    Route::get('/admin-about-list', [AboutController::class, 'aboutlist']);
    Route::get('/admin-about-create', function() {
        return view('Admin.admin-about-create');
    });
    Route::get('/admin-about-edit/{id}', [AboutController::class, 'aboutedit'])->name('about-edit');

    Route::post('/admin-about-create', [AboutController::class, 'createabout']);

    Route::post('/admin-about-edit/{id}', [AboutController::class, 'updateabout']);

    Route::delete('/admin-about-list/{id}', [AboutController::class, 'deleteabout'])->name('about-delete');

    Route::get('/admin-blogs-create', [BlogController::class, 'getcategories']);

    Route::post('/admin-blogs-create', [BlogController::class, 'createblog']);

    Route::get('/admin-blogs-list', [BlogController::class, 'listblog']);

    Route::get('/admin-blogs-edit/{id}', [BlogController::class, 'editblogs'])->name('blogs-edit');

    Route::post('/admin-blogs-edit/{id}', [BlogController::class, 'updateblog']);

    Route::delete('/admin-blogs-list/{id}', [BlogController::class, 'deleteblog'])->name('blogs-delete');

    Route::get('/admin-contact-list', [ContactController::class, 'listContact']);

    Route::delete('/admin-contact-list/{id}', [ContactController::class, 'deletecontact'])->name('contact-delete');

    Route::get('/admin-contact-edit/{id}', [ContactController::class, 'editcontact'])->name('contact-edit');

    Route::post('/admin-contact-edit/{id}', [ContactController::class, 'updateContact']);

    Route::get('/admin-homepage-list', [HomePageController::class, 'homepagelist']);

    Route::get('/admin-homepage-edit/{id}', [HomePageController::Class, 'homepageedit'])->name('homepage-update');

    Route::post('/admin-homepage-edit/{id}', [HomePageController::class, 'homepageupdate']);

    Route::delete('/admin-homepage-list/{id}', [HomePageController::class, 'deletehomepage'])->name('homepage-delete');

    Route::get('/admin-homepage-create', [HomePageController::class, 'getcreatehomepage']);

    Route::post('/admin-homepage-create', [HomePageController::class, 'createhomepage']);

    Route::get('/admin-contact-create', [ContactController::class, 'getcontactcreate']);

    Route::post('/admin-contact-create', [ContactController::class, 'createcontact']);

    Route::get('/admin-message-list', [ContactController::class, 'listmessage']);

    Route::delete('/admin-message-list/{id}', [ContactController::class, 'deletemessage'])->name('message-delete');

    Route::get('/admin-message-read/{id}', [ContactController::class, 'readmessage'])->name('message-read');
});


