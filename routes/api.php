<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/', function () {
//     return view('auth/login');
// })->middleware(['auth', 'verified']);

// em uso
//Route::middleware(['auth'])->group(function(){

    Route::prefix('book')->as('book.')->group(function(){

        Route::get('list','BookController@list')->name('list');
        Route::post('store','BookController@store')->name('store');
        Route::put('edit/{id}','BookController@edit')->name('edit');
       
    });
//});  

/* 
      Route::get('lista','Fixo\PagamentoFixoController@lista')->name('lista');
  //      Route::get('lista','Fixo\PagamentoFixoController@auto')->name('auto');
        Route::get('cadastro','Fixo\PagamentoFixoController@cadastro')->name('cadastro');
        Route::post('cadastro','Fixo\PagamentoFixoController@salvar')->name('salvar');
        Route::get('lista/{id}','Fixo\PagamentoFixoController@realizadoFixo')->name('realizadoFixo');
        Route::get('editar/{id}','Fixo\PagamentoFixoController@editar')->name('pagamento/fixo.editar');
        Route::post('editar/{id}','Fixo\PagamentoFixoController@update')->name('update');
        Route::post('deletar/{id}','Fixo\PagamentoFixoController@deletar')->name('deletar');   
        
        Route::post('lista','Fixo\PagamentoFixoController@categoria')->name('categoria');
        Route::get('editar/{id}','Fixo\PagamentoFixoController@editar')->name('pagamento/fixo.editar');
        Route::post('lista/{id}','Fixo\PagamentoFixoController@update')->name('update');
        
        Route::get('show/{id}','Fixo\PagamentoFixoController@show')->name('show');

*/