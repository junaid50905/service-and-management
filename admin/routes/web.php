<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EngineerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('admin')->group(function () {
    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    // category
    Route::prefix('/category')->group(function () {
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/all-categories', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    });    


    Route::prefix('/engineer')->group(function () {

        Route::get('/create', [EngineerController::class, 'create'])->name('engineer.create');
        Route::post('/store', [EngineerController::class, 'store'])->name('engineer.store');
        Route::get('/all-categories', [EngineerController::class, 'index'])->name('engineer.index');
        Route::get('/{id}/edit', [EngineerController::class, 'edit'])->name('engineer.edit');
        Route::get('/{id}/delete', [EngineerController::class, 'delete'])->name('engineer.delete');
        Route::post('/{id}/update', [EngineerController::class, 'update'])->name('engineer.update');
    });    
});
