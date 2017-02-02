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

Route::get('/', function () {
    return view('welcome');
});

//Route::auth();

//Route::get('/home', 'HomeController@index');
Route::post('/save_url', 'ShortUrlController@save_url');
//Route::get('/get_url', 'ShortUrlController@index');
Route::get('/add_url', function () {
    return view('add_url');
});
Route::get('/{short_code}', 'ShortUrlController@visit_url');



