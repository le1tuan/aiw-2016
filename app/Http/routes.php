<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Http\Controllers\NewsCommentController;
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
/*
 * API route
 * It returns data
 */
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');
Route::group(['prefix' => 'news'], function () {
    Route::get('/', 'NewsController@index');
    Route::get('{slug}', 'NewsController@show');
});
Route::group(['prefix' => 'multimedia'], function () {
    Route::get('/', 'MultimediaController@index');
    Route::get('{slug}', 'MultimediaController@show');
});
Route::group(['prefix' => 'category'], function () {
    Route::get('/', 'CategoryController@index');
    Route::get('/{name}','CategoryController@show');
});
Route::group(['prefix' => 'tag'], function () {
    Route::get('/', 'TagController@index');
    Route::get('/{name}','TagController@show');
});


/*
 * ADMIN route
 */
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'Admin\AdminController@index');
    Route::group(['prefix' => 'news'], function () {
        Route::resource('/', 'Admin\NewsController');
        Route::delete('/{id}', 'Admin\NewsController@destroy');
        Route::get('/{id}/edit', 'Admin\NewsController@edit');
        Route::put('/{id}', 'Admin\NewsController@update');
    });
    Route::group(['prefix' => 'multimedia'], function () {
        Route::resource('/', 'Admin\MultimediaController');
        Route::delete('/{id}', 'Admin\MultimediaController@destroy');
        Route::get('/{id}/edit', 'Admin\MultimediaController@edit');
        Route::put('/{id}', 'Admin\MultimediaController@update');
    });
    Route::group(['prefix' => 'category'], function () {
        Route::resource('/', 'Admin\CategoryController');
        Route::get('/{id}/edit', 'Admin\CategoryController@edit');
        Route::put('/{id}', 'Admin\CategoryController@update');
        Route::delete('/{id}', 'Admin\CategoryController@destroy');
    });
    Route::group(['prefix' => 'tag'], function () {
        Route::resource('/', 'Admin\TagController');
        Route::get('/{id}/edit', 'Admin\TagController@edit');
        Route::put('/{id}', 'Admin\TagController@update');
        Route::delete('/{id}', 'Admin\TagController@destroy');
    });
});
Route::auth();
/**
 * Comment
 */
Route::group(['prefix' => 'newscomment'], function () {
    Route::resource('/', 'NewsCommentController', ['only' => ['store', 'index']]);
    Route::post('/','NewsCommentController@store');
    Route::get('/{slug}/update','NewsCommentController@updateComment');
});
Route::get('search/{title}','SearchController@search');
