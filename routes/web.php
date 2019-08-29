<?php

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

/*home*/
Route::get('/', function () {
    return view('user.home');
})->name('home');
// book
Route::group(['prefix' => 'book'], function(){
    Route::get('/detail', function(){
        return view('user.book-detail');
    })->name('book-detail');

    Route::get('/read', function(){
        return view('user.book-read');
    })->name('book-read');

    Route::get('/categories', function(){
        return view('user.book-category');
    })->name('book-category');

    Route::get('/favorite', function(){
        return view('user.book-favorite');
    })->name('book-favorite');

    Route::get('/reading', function(){
        return view('user.book-reading');
    })->name('book-reading');

    Route::get('/require', function(){
        return view('user.book-require');
    })->name('book-require');
});
// profile
Route::group(['prefix' => 'profile'], function(){
    Route::get('/edit', function(){
        return view('user.profile-edit');
    })->name('profile-edit');
});
/*activity*/
Route::get('/activities', function(){
        return view('user.activity');
})->name('activity');
// Login

Route::get('/login', function(){
        return view('user.login');
})->name('login');

Route::get('/register', function(){
        return view('user.register');
})->name('register');
