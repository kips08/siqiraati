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

Route::get('guru','GuruController@index');
Route::get('guru/json','GuruController@json');

Route::get('edit/{id}','GuruController@edit');
Route::post('image-upload', 'GuruController@imageUploadPost')->name('img.upload.post');