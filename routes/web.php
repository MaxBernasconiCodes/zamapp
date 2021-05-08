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
    //Rutas de testeo
Route::get('/test/user', 'App\Http\Controllers\TestController@singleUser')->name('factorySingleUser');
Route::get('/test/admin', 'App\Http\Controllers\TestController@admin')->name('factoryAdmin');
Route::get('/test/users/{amount}', 'App\Http\Controllers\TestController@lotsUsers')->name('factoryUsers');
Route::get('/test/pedido', 'App\Http\Controllers\TestController@singlePedido');
Route::get('/test/pedidos}', 'App\Http\Controllers\TestController@lotsPedidos');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware'=>'admins'],function(){

    //Rutas de usuario y admin
    Route::get('/users/index/{operation?}','App\Http\Controllers\UserManagementController@index')->name('userIndex');
    Route::get('/users/create','App\Http\Controllers\UserManagementController@create')->name('usersCreate');
    Route::post('/users','App\Http\Controllers\UserManagementController@store')->name('usersRegister');
    //Route::get('/users/show/{id}','App\Http\Controllers\UserManagementController@show')->name('usersShow');
    Route::get('/users/edit/{id}','App\Http\Controllers\UserManagementController@edit')->name('usersEdit');
    Route::patch('/users/update/{id}','App\Http\Controllers\UserManagementController@update')->name('usersModify');
    Route::delete('/users/delete/{id}','App\Http\Controllers\UserManagementController@destroy')->name('usersDelete');
    //Rutas de Pedidos
    Route::get('/pedidos/index/{operation?}','App\Http\Controllers\PedidoController@index')->name('pedidoIndex');
    Route::get('/pedidos/create','App\Http\Controllers\PedidoController@create')->name('pedidoCreate');
    Route::post('/pedidos','App\Http\Controllers\PedidoController@store')->name('pedidoRegister');
    //Route::get('/users/show/{id}','App\Http\Controllers\PedidoController@show')->name('usersShow');
    Route::get('/pedidos/edit/{id}','App\Http\Controllers\PedidoController@edit')->name('pedidoEdit');
    Route::patch('/pedidos/update/{id}','App\Http\Controllers\PedidoController@update')->name('pedidoModify');
    Route::delete('/pedidos/delete/{id}','App\Http\Controllers\PedidoController@destroy')->name('pedidoDelete');
});
