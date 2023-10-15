<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EngineerController;
use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AppiontmentController;
use App\Http\Controllers\Admin\ApplianceController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\SellingProductController;

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

    // subcategory
    Route::prefix('/subcategory')->group(function () {
        Route::get('/create', [SubcategoryController::class, 'create'])->name('subcategory.create');
        Route::post('/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
        Route::get('/all-subcategories', [SubcategoryController::class, 'index'])->name('subcategory.index');
        Route::get('/{id}/delete', [SubcategoryController::class, 'delete'])->name('subcategory.delete');
        Route::get('/{id}/edit', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
        Route::post('/{id}/update', [SubcategoryController::class, 'update'])->name('subcategory.update');
    });

    // products
    Route::prefix('/product')->group(function () {
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/all-products', [ProductController::class, 'index'])->name('product.index');
        Route::get('/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/{id}/update', [ProductController::class, 'update'])->name('product.update');
    });

    // appliances
    Route::prefix('/appliance')->group(function () {
        Route::get('/create', [ApplianceController::class, 'create'])->name('appliance.create');
        Route::post('/store', [ApplianceController::class, 'store'])->name('appliance.store');
        Route::get('/all-appliances', [ApplianceController::class, 'index'])->name('appliance.index');
        Route::get('/{id}/delete', [ApplianceController::class, 'delete'])->name('appliance.delete');
        Route::get('/{id}/edit', [ApplianceController::class, 'edit'])->name('appliance.edit');
        Route::post('/{id}/update', [ApplianceController::class, 'update'])->name('appliance.update');
    });

    // engineer
    Route::prefix('/engineer')->group(function () {
        Route::get('/create', [EngineerController::class, 'create'])->name('engineer.create');
        Route::post('/store', [EngineerController::class, 'store'])->name('engineer.store');
        Route::get('/all-engineers', [EngineerController::class, 'index'])->name('engineer.index');
        Route::get('/{id}/edit', [EngineerController::class, 'edit'])->name('engineer.edit');
        Route::get('/{id}/delete', [EngineerController::class, 'delete'])->name('engineer.delete');
        Route::post('/{id}/update', [EngineerController::class, 'update'])->name('engineer.update');
    });



    // selling product
    Route::prefix('/selling-product')->group(function () {
        Route::get('/all-products', [SellingProductController::class, 'index'])->name('selling_product.index');
    });



    //////////////////////// service management ////////////////////

    // appiontment
    Route::prefix('/appiontment')->group(function () {
        Route::get('/make-an-appiontment', [AppiontmentController::class, 'checkUserProductForm'])->name('appiontment.check_user_product_form');
        Route::post('/make-an-appiontment', [AppiontmentController::class, 'checkUserProductStore'])->name('appiontment.check_user_product_store');

        Route::post('/appiontment/store', [AppiontmentController::class, 'appiontmentStore'])->name('appiontment.appiontment_store');


        Route::get('/all-appiontments', [AppiontmentController::class, 'index'])->name('appiontment.index');
        Route::get('/assign-engineer/{id}', [AppiontmentController::class, 'assignEngineer'])->name('appiontment.assign_engineer');
        Route::post('/assign-engineer/store', [AppiontmentController::class, 'assignEngineerStore'])->name('appiontment.assign_engineer_store');


        Route::get('/assigned-engineer-details/user/{id}', [AppiontmentController::class, 'assignedEngineerDetailed'])->name('appiontment.assigned_engineer_detailed');

    });

    // checklist
    Route::prefix('/checklist')->group(function () {
        Route::get('/create', [ChecklistController::class, 'create'])->name('checklist.create');
        Route::post('/store', [ChecklistController::class, 'store'])->name('checklist.store');
        Route::get('/all-checklists', [ChecklistController::class, 'index'])->name('checklist.index');
        Route::get('/{id}/edit', [ChecklistController::class, 'edit'])->name('checklist.edit');
        Route::get('/{id}/delete', [ChecklistController::class, 'delete'])->name('checklist.delete');
        Route::post('/{id}/update', [ChecklistController::class, 'update'])->name('checklist.update');
        Route::get('/{id}/view', [ChecklistController::class, 'view'])->name('checklist.view');
    });






});



