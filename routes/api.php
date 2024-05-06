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
        Route::delete('delete/{id}','BookController@delete')->name('delete');
       
    });

    Route::prefix('store')->as('store.')->group(function(){

        Route::get('list','StoreController@list')->name('list');
        Route::post('store','StoreController@store')->name('store');
        Route::put('edit/{id}','StoreController@edit')->name('edit');
        Route::delete('delete/{id}','StoreController@delete')->name('delete');
       
    });
//});  

