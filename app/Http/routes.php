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
    return view('home');
});

//SearchController
Route::get('/search', 'SearchController@index');
Route::get('/searchResult', 'SearchController@searchResult');
Route::get('near', 'SearchController@near');
Route::get('/getAll', 'SearchController@getAll');

//BankController
Route::get('/getBankList', 'BankController@index');
Route::get('/addBankList', 'BankController@add');

//AtmController
Route::get('/getAtmList', 'AtmController@index');


Route::get('/addAtm', 'AtmController@store');
Route::get('/home', 'AtmController@admin');
Route::get('/delete/{atm}', 'AtmController@destroy');
Route::get('/edit/{atm}', 'AtmController@edit');


Route::get('/formadd', function () {
    return view('formadd');
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::controllers([
  'auth' => 'Auth\AuthController',
  'password' => 'Auth\PasswordController',
]);

Route::get('/info', function () {
    return view('info');
});

Route::get('/show/{atm}', 'AtmController@show');


