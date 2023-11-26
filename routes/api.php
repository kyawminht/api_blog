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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/posts',[\App\Http\Controllers\PostController::class,'index']);
Route::get('/post/{id}',[\App\Http\Controllers\PostController::class,'show']);
Route::post('/add-post',[\App\Http\Controllers\PostController::class,'store']);
Route::put('/posts/update/{id}',[\App\Http\Controllers\PostController::class,'update']);
Route::delete('/post-delete/{id}',[\App\Http\Controllers\PostController::class,'destroy']);




