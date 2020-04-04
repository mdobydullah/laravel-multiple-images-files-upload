<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// file upload
Route::get('upload', 'FileUploadController@index');
Route::post('upload', 'FileUploadController@upload')->name('upload');

//auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
