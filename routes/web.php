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

Route::group(['namespace' => 'User'], function(){
    /*homepage*/
    Route::get('/', 'HomeController@index')->name('homepage');
    // book
    Route::group(['prefix' => 'book'], function(){

        Route::get('/detail/{id}', 'BookDetailController@index')->name('book-detail');

        Route::post('/detail/{id}', 'BookDetailController@voteBook')->name('book-detail-vote');

        Route::post('/detail/{id}/review', 'BookDetailController@reviewBook')->name('book-detail-review');

        Route::post('/detail/{id}/review/edit', 'BookDetailController@editReview')->name('book-detail-review-edit');

        Route::post('/detail/review/delete', 'BookDetailController@deleteReview')->name('book-detail-review-delete');

        Route::post('/detail/{id}/reply', 'BookDetailController@replyReview')->name('book-detail-reply');

        Route::post('/detail/{id}/reply/edit', 'BookDetailController@editReply')->name('book-detail-reply-edit');

        Route::post('/detail/reply/delete', 'BookDetailController@deleteReply')->name('book-detail-reply-delete');

        Route::get('/read/{id}', 'BookDetailController@readBook')->name('book-read');

        Route::get('/categories/{id}', 'BookCategoryController@index')->name('book-category');

        Route::get('/author/{id}', 'BookAuthorController@index')->name('book-author');

        Route::get('/publisher/{id}', 'BookPublisherController@index')->name('book-publisher');

        Route::get('/favorite/list', 'FavoriteBookController@index')->name('book-favorite');

        Route::get('/favorite/add/{idBook}', 'FavoriteBookController@addFavoriteBook')->name('book-favorite-add');

        Route::get('/reading', function(){
            return view('user.book-reading');
        })->name('book-reading');

        Route::resource('require', 'RequireBookController')->except([
            'show',

        ]);

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

});

Auth::routes();

//admin
Route::group(['prefix' => 'cp-admin'], function(){
    Route::get('/', function(){
        return view('admin.home');
    });
});



Route::get('/home', 'HomeController@index')->name('home');
