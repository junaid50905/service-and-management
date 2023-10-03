<?php

use App\Http\Controllers\Api\FrontendController;
use App\Http\Controllers\Api\UserController;
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


// private routes
Route::middleware(['auth:sanctum'])->group(function () {

    Route::prefix('/v1')->group(function (){
        Route::post('/u/logout', [UserController::class, 'logout']);
        Route::get('/u/logged-user-data', [UserController::class, 'logged_user_data']);
    });

});

// public routes
Route::prefix('/v1')->group(function () {

    Route::get('/products', [FrontendController::class, 'allProducts']);

    // user authentication
    Route::post('/u/register', [UserController::class, 'register']);
    Route::post('/u/login', [UserController::class, 'login']);


});
