<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PhotographerController;
use App\Http\Controllers\PhotoController;

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

Route::get("/photographer", [PhotographerController::class, "index"]);
Route::prefix("/photographer")->group( function () {
    Route::post('/store', [PhotographerController::class, "store"]);
} );

Route::get("/photos", [PhotoController::class, "index"]);
Route::prefix("/photo")->group( function () {
    Route::post('/store', [PhotoController::class, "store"]);
} );
