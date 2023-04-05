<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'LoginController@login')->name('login');
Route::post('do_login', 'LoginController@doLogin')->name('do.login');

Route::get('admin/login', 'AdminController@login')->name('admin.login');
Route::post('admin/do_login', 'AdminController@doLogin')->name('admin.do.login');
Route::get('admin/users', 'AdminController@homePage')->name('admin.home');
Route::get('admin/logout', 'AdminController@logout')->name('admin.do.logout');


Route::group(['middleware' => 'user_auth'], function () {

    Route::get('logout', 'LoginController@logout')->name('do.logout');
    Route::get('export', 'FrondEndController@export')->name('export');
    Route::get('pdf', 'FrondEndController@pdf')->name('pdf');

    Route::get('/users', 'FrondEndController@homePage')->name('home');

    Route::get('new-user', 'FrondEndController@create')->name('create.user');
    Route::post('save-user', 'FrondEndController@save')->name('save.user');

    Route::get('edit-user/{userId}', 'FrondEndController@edit')->name('edit.user');
    Route::get('view-user/{userId}', 'FrondEndController@viewUser')->name('view.user');

    Route::post('update-user', 'FrondEndController@update')->name('update.user');

    Route::get('delete-user/{userId}', 'FrondEndController@delete')->name('delete.user');
    Route::get('activate-user/{userId}', 'FrondEndController@activate')->name('activate.user');
    Route::get('force-delete-user/{userId}', 'FrondEndController@forceDelete')->name('forceDelete.user');
});
