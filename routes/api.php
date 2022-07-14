<?php

use App\Http\Controllers\API\SalesOptyController;
use App\Http\Controllers\SalesViewController;
use App\Models\SalesOpty;
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

Route::apiResource('salesopty','\App\Http\Controllers\API\SalesOptyController', [
    "only" => ["store", "update", "index", "edit", "destroy"]
]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
