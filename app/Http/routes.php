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

use Illuminate\Support\Facades\App;

Route::get('/', function () {
    return view('welcome');
});
Route::auth();
Route::post('/home/{locale}', ['middleware' => 'language', 'uses' => 'HomeController@locale']);
Route::get('/home', 'HomeController@index');
Route::resource('news','NewsController');