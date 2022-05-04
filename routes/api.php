<?php

use App\Http\Controllers\Api\IndexController;
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

Route::prefix('v1')->group(function (){
    Route::get('/index',[IndexController::class,'index']);
    Route::get('/jobs',[IndexController::class,'jobs']);
    Route::get('/top-blogs',[IndexController::class,'get_top_blogs']);
    Route::get('/blogs',[IndexController::class,'get_blogs']);
    Route::get('/blogs/{slug}',[IndexController::class,'get_blog']);
});
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
