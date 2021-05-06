<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware'=>'admins'],function(){

    Route::get('/users/index/{operation?}','App\Http\Controllers\UserManagementController@index')->name('userIndex');
    Route::get('/users/create','App\Http\Controllers\UserManagementController@create')->name('usersCreate');
    Route::post('/users','App\Http\Controllers\UserManagementController@store')->name('usersRegister');
    //Route::get('/users/show/{id}','App\Http\Controllers\UserManagementController@show')->name('usersShow');
    Route::get('/users/edit/{id}','App\Http\Controllers\UserManagementController@edit')->name('usersEdit');
    Route::patch('/users/update/{id}','App\Http\Controllers\UserManagementController@update')->name('usersModify');
    Route::delete('/users/delete/{id}','App\Http\Controllers\UserManagementController@destroy')->name('usersDelete');
});
