<?php

use App\Http\Controllers\TDLController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// CRUD TODO ITEM
Route::get('/todo', [TDLController::class, 'index']);
Route::prefix('/todo')->group(function () {
    Route::post('/store', [TDLController::class, 'store']);
    Route::put('/{TDL}', [TDLController::class, 'update']);
    Route::delete('/{TDL}', [TDLController::class, 'destroy']);
});