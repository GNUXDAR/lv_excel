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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'ExcelController@index')->name('home');

Route::post('/import-excel', 'ExcelController@importFile');
//Route::post('/export', 'ExcelController@importFile');

Route::get('/tabla', 'ExcelController@tabla');

Route::get('validate-albaran','ExcelController@validateAlbaran');