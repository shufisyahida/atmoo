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

//BankController
Route::get('/getBankList', 'BankController@index');
Route::get('/addBankList', 'BankController@add');

//AtmController
Route::get('/getAtmList', 'AtmController@index');
<<<<<<< HEAD
 Route::get('near', 'SearchController@near');
=======
Route::get('/addAtm', 'AtmController@store');
>>>>>>> 0b13b42c6f79fe045d5224af2cd74591a0f6210f

Route::get('/formadd', function () {
    return view('formadd');
});



