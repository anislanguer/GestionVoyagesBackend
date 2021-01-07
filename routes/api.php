<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VoyageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('voyages',[VoyageController::class, 'index']);

Route::get("voyage/{id}",[VoyageController::class,'getVoyage']);

Route::post("voyages","App\Http\Controllers\VoyageController@save");

//Modifier voyage

Route::put("voyages",[VoyageController::class, 'update']);

//supprimer voyage

Route::delete('voyages/{id}',[VoyageController::class,'delete'] );