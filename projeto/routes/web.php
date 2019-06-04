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

Auth::routes();

$this->group(['middleware'=>['auth']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::get('usuario/editar/{id}','ClienteController@editar')->name('usuario.editar');
    Route::get('usuario/novo', 'ClienteController@novo')->name('usuario.novo');
    Route::get('account', 'ClienteController@account')->name('account');
    Route::post('usuario/updateAccount','ClienteController@update_account')->name('usuario.updateAccount');

    Route::get('usuario/excluir/{id}','ClienteController@excluir')->name('usuario.excluir');
    Route::post('usuario/store','ClienteController@store')->name('usuario.store');
    Route::post('usuario/update','ClienteController@update')->name('usuario.update');
    
   Route::get('imagem/novo', 'ImagemController@novo')->name('imagem.novo');
   Route::post('imagem/store','ImagemController@store')->name('imagem.store');
    Route::get('imagem/excluir/{id}','ImagemController@excluir')->name('imagem.excluir');
   
    
});