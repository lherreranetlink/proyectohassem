<?php

use Illuminate\Http\Request;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/try_login', 'OperacionController@try_login');
Route::post('/register', 'RegisterController@register');
Route::get('/get_users_per_region', 'UsersController@get_users_per_regions');
Route::post('/follow_user', 'UsersController@follow_user');
Route::get('/get_followers', 'FansController@get_followers');
Route::get('/get_idolos',  'FansController@get_idolos');
Route::post('/quit_follow', 'UsersController@remove_follow');