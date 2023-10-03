<?php

use App\Http\Controllers\Frontend\Api\ProductController as ApiProductController;
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


Route::prefix('/v1')->group(function () {
    Route::get('/products', [ApiProductController::class, 'index']);
    // Route::get('/students/{id}', [ApiProductController::class, 'show']);
    // Route::post('/students', [ApiProductController::class, 'store']);
    // Route::put('/student/update/{id}', [ApiProductController::class, 'update']);
    // Route::delete('/students/{id}', [ApiProductController::class, 'destroy']);
    // Route::get('/students/search/{email}', [ApiProductController::class, 'search']);
});
