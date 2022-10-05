<?php

use App\Http\Controllers\ToDoItemController;
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

Route::get('/items', [ToDoItemController::class, 'index']);

Route::prefix('/items')->group( function() {
    Route::post('/store', [ToDoItemController::class, 'store']);
    Route::put('/{id}', [ToDoItemController::class, 'update']);
    Route::delete('/{id}', [ToDoItemController::class, 'destroy']);
});
