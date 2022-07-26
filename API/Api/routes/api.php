<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usersController;
use App\Http\Controllers\adocaoController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('api')->name('api')->group(function(){

    Route::prefix('users')->group(function(){
            Route::post(
                '/',
                [usersController::class,'registrar']
            );
            Route::post(
                '/logar',
                [usersController::class,'logar']
            );
    });
    Route::prefix('adocao')->group(function(){
        Route::post(
            '/',
            [adocaoController::class,'registrarPET']
        );
       
});

});