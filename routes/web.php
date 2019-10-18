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

        Route::get('/detail/review/delete', 'BookDetailController@deleteReview')->name('book-detail-review-delete');

        Route::get('/detail/review/like', 'BookDetailController@likeReview')->name('book-detail-review-like');

        Route::get('/detail/review/unlike', 'BookDetailController@unlikeReview')->name('book-detail-review-unlike');

        Route::post('/detail/{id}/reply', 'BookDetailController@replyReview')->name('book-detail-reply');

        Route::post('/detail/{id}/reply/edit', 'BookDetailController@editReply')->name('book-detail-reply-edit');

        Route::get('/detail/reply/delete', 'BookDetailController@deleteReply')->name('book-detail-reply-delete');

        Route::get('/read/{id}', 'BookDetailController@readBook')->name('book-read');

        Route::get('/categories/{id}', 'BookCategoryController@index')->name('book-category');

        Route::get('/author/{id}', 'BookAuthorController@index')->name('book-author');

        Route::get('/publisher/{id}', 'BookPublisherController@index')->name('book-publisher');

        Route::get('/favorite/list', 'FavoriteBookController@index')->name('book-favorite');

        Route::get('/favorite/add/{idBook}', 'FavoriteBookController@addFavoriteBook')->name('book-favorite-add');

        Route::get('/search', 'SearchController@index')->name('user-search');

        Route::get('/reading-books', 'ReadingBookController@index')->name('reading-book');

        Route::resource('require', 'RequireBookController')->except([
            'show',

        ]);

    });
    // profile
    Route::group(['prefix' => 'profile'], function(){
        Route::get('/edit', function(){
            return view('user.profile-edit');
        })->name('profile-edit');

        Route::get('/following', 'ProfileController@following')->name('profile-following');
        Route::get('/follower', 'ProfileController@follower')->name('profile-follower');
    });
    /*activity*/
    Route::group(['prefix' => '/activity'], function(){
        Route::get('/list', 'ActivityController@list')->name('activity');

    });
    /*follow*/
    Route::group(['prefix' => 'user'], function(){
        Route::get('/detail/{id}', 'UserFollowOtherController@detailUser')->name('show-detail-user');
        Route::get('/add-follow', 'UserFollowOtherController@addFollow')->name('user-add-follow');
    });

    Route::group(['prefix' => 'notification'], function(){
        Route::get('/{idRequire}/detail/{idNotice}', 'NotificationController@detail')->name('user-notification.detail');
        Route::get('/all', 'NotificationController@showAll')->name('user-notification.all');
    });

});

Auth::routes();

//admin
Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'cp-admin'], function () {
        Route::resource('book', 'BookController');
        Route::resource('editbook','RequestBookController');
        Route::resource('book', 'BookController');
        Route::resource('user', 'UserController');
        Route::resource('role', 'RoleController');
        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
        Route::group(['prefix' => 'notification'], function(){
            Route::get('/{idRequire}/detail/{idNotice}', 'NotificationController@detail')->name('notification.detail');
            Route::get('/all', 'NotificationController@showAll')->name('notification.all');
        });


        Route::group(['prefix' => 'chart'], function(){
            Route::post('/get-book-data-to-chart', 'DashboardController@getBookData');
            Route::get('/book', 'DashboardController@chartBook')->name('chart.book');
        });
    });

});

Route::get('testPusher', 'PusherController@index');
Route::get('filePusher', 'PusherController@filePusher');
Route::get('testToken', 'PusherController@testToken')->name('test.token');
Route::get('sendToken/{token}', 'PusherController@sendToken')->name('send.token')/*->middleware('csrf')*/;
