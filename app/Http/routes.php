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
header('Access-Control-Allow-Origin: *');
/*
 * API route
 * It returns data
 */
Route::get('/','HomeController@index');
Route::get('home','HomeController@index');
Route::group(['prefix'=>'news'],function(){
    Route::get('/','NewsController@index');
    Route::get('{slug}','NewsController@show');
});
Route::group(['prefix'=>'multimedia'],function(){
    Route::get('/','MultimediaController@index');
    Route::get('{slug}','MultimediaController@show');
});
Route::group(['prefix'=>'category'],function(){
    Route::get('/','CategoryController@index');
});





/*
 * ADMIN route
 */
Route::group(['prefix'=>'admin','middleware' => 'auth'],function(){
    Route::get('/','Admin\AdminController@index');
    Route::group(['prefix'=>'news'], function(){
        Route::resource('/', 'Admin\NewsController');
        Route::delete('/{id}','Admin\NewsController@destroy');
        Route::get('/{id}/edit','Admin\NewsController@edit');
        Route::put('/{id}','Admin\NewsController@update');
    });
    Route::group(['prefix'=>'category'], function(){
        Route::resource('/', 'Admin\CategoryController');
    });
});
Route::auth();
