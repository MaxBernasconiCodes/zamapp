<?php
use App\Http\Livewire\InicioRedirect;

use App\Http\Livewire\AdminUsersIndex;
use App\Http\Livewire\AdminUsersCreate;
use App\Http\Livewire\AdminUsersEdit;
use App\Http\Livewire\AdminUsersShow;

use App\Http\Livewire\AdminPedidosIndex;
use App\Http\Livewire\AdminPedidosCreate;
use App\Http\Livewire\AdminPedidosEdit;
use App\Http\Livewire\AdminPedidosShow;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function(){
    Route::get('/', InicioRedirect::class)->name('Inicio');
});



    //Rutas de testeo
Route::get('/test/user', 'App\Http\Controllers\TestController@singleUser')->name('factorySingleUser');
Route::get('/test/admin', 'App\Http\Controllers\TestController@admin')->name('factoryAdmin');
Route::get('/test/users/{amount}', 'App\Http\Controllers\TestController@lotsUsers')->name('factoryUsers');
Route::get('/test/pedido', 'App\Http\Controllers\TestController@singlePedido')->name('factorySinglePedido');
Route::get('/test/pedidos/{amount}', 'App\Http\Controllers\TestController@lotsPedidos')->name('factoryPedidos');

Route::group(['middleware'=>'admins'],function(){

    //Rutas Viejas de usuario y admin
    //Route::get('/users/index/{operation?}','App\Http\Controllers\UserManagementController@index')->name('userIndex');
    //Route::get('/users/create','App\Http\Controllers\UserManagementController@create')->name('usersCreate');
    //Route::post('/users','App\Http\Controllers\UserManagementController@store')->name('usersRegister');
    //Route::get('/users/show/{id}','App\Http\Controllers\UserManagementController@show')->name('usersShow');
    //Route::get('/users/edit/{id}','App\Http\Controllers\UserManagementController@edit')->name('usersEdit');
    //Route::patch('/users/update/{id}','App\Http\Controllers\UserManagementController@update')->name('usersModify');
    //Route::delete('/users/delete/{id}','App\Http\Controllers\UserManagementController@destroy')->name('usersDelete');
    
    //Rutas viejas de Pedidos
    //Route::get('/pedidos/index/{operation?}','App\Http\Controllers\PedidoController@index')->name('pedidoIndex');
    //Route::get('/pedido/pedidos/{operacion?}', UserPedidosIndex::class)->name('pedidoPedidosIndex');
    //Route::get('/pedidos/create','App\Http\Controllers\PedidoController@create')->name('pedidoCreate');
    //Route::post('/pedidos','App\Http\Controllers\PedidoController@store')->name('pedidoRegister');
    //Route::get('/pedido/show/{id}','App\Http\Controllers\PedidoController@show')->name('pedidoShow');
    //Route::get('/pedidos/edit/{id}','App\Http\Controllers\PedidoController@edit')->name('pedidoEdit');
    //Route::patch('/pedidos/update/{id}','App\Http\Controllers\PedidoController@update')->name('pedidoModify');
    //Route::delete('/pedidos/delete/{id}','App\Http\Controllers\PedidoController@destroy')->name('pedidoDelete');

    //Nuevas Rutas Pedidos
    Route::get('/admin/pedidos/create', AdminPedidosCreate::class)->name('adminPedidosCreate');
    Route::get('/admin/pedidos/show/{pedido_id}', AdminPedidosShow::class)->name('adminPedidosShow');
    Route::get('/admin/pedidos/edit/{pedido_id}', AdminPedidosEdit::class)->name('adminPedidosEdit');
    Route::get('/admin/pedidos/index', AdminPedidosIndex::class)->name('adminPedidosIndex');

    //Nuevas Rutas Users
    Route::get('/admin/users/create', AdminUsersCreate::class)->name('adminUsersCreate');
    Route::get('/admin/users/show/{user_id}', AdminUsersShow::class)->name('adminUsersShow');
    Route::get('/admin/users/edit/{user_id}', AdminUsersEdit::class)->name('adminUsersEdit');
    Route::get('/admin/users/index', AdminUsersIndex::class)->name('adminUsersIndex');
});
