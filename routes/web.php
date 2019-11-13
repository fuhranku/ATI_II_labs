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
    return redirect('/create');
});

Route::get('/create', function () {
    return view('modal');
});

Route::get('/update', function () {
    return view('update');
});

Route::get('/read',function(){
    return view('read');
});

// Create
Route::get('create', 'FormController@create')->name('create.create');

Route::post('create','FormController@store')->name('create.store');

// Update
Route::get('update', 'FormController@update')->name('update.update');

// Read
Route::get('read', 'FormController@read')->name('read.update');

// Delete
Route::get('delete', 'FormController@getdelete')->name('delete.getdelete');

Route::post('delete', 'FormController@delete')->name('delete.delete');
