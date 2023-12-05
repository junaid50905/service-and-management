<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EngineerController;
use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AppiontmentController;
use App\Http\Controllers\Admin\ApplianceController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\SellingProductController;
use App\Http\Controllers\Admin\ServiceRequestController;
use App\Http\Controllers\CustomeAuthController;
use App\Http\Controllers\Customer\CustomerController as CustomerCustomerController;
use App\Http\Controllers\Customer\CustomerDashboard;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\Engineer\EngineerController as EngineerEngineerController;
use App\Http\Controllers\Engineer\EngineerDashboardController;
use App\Http\Controllers\TestController;

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


Route::get('/', [CustomeAuthController::class, 'redirectToLogin']);
Route::get('/sign-in', [CustomeAuthController::class, 'loginForm'])->name('login');
Route::post('/sign-in/store', [CustomeAuthController::class, 'loginStore'])->name('login.store');


Route::middleware(['customAuthCheck'])->group(function () {
    Route::get('/logout', [CustomeAuthController::class, 'logout'])->name('logout');

    /////////////////////// Dependancy Dropdown for admin panel start ////////////////////////
    Route::get('getSubcategory/{category_id}', [ProductController::class, 'getSubcategory']);

    Route::get('getSubcategory/{category_id}', [ApplianceController::class, 'getSubcategory']);
    Route::get('admin/appliance/getProduct/{category_id}/{subcategory_id}', [ApplianceController::class, 'getProduct']);

    Route::get('getSubcategory/{category_id}', [EngineerController::class, 'getSubcategory']);
    Route::get('getEngineerBlockSlot/{engineer_id}', [EngineerController::class, 'getEngineerBlockSlot']);

    Route::get('getSubcategory/{category_id}', [CustomerController::class, 'getSubcategory']);
    Route::get('getProduct/{subcategory_id}', [CustomerController::class, 'getProduct']);



    Route::get('getBranches/{user_id}', [CustomerController::class, 'getBranches'])->name('getBranches');
    /////////////////////// Dependancy Dropdown end ////////////////////////

    // admin
    Route::prefix('admin')->group(function () {
        // dashboard
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/all-todays-working-tasks', [DashboardController::class, 'allTodaysWorkingTasks'])->name('admin.allTodaysWorkingTasks');


        Route::get('/getEngineersLocationInOneMap/{engineerId}/{appiontmentId}', [DashboardController::class, 'getEngineersLocationInOneMap']);

        // category
        Route::prefix('/category')->group(function () {
            Route::get('/create-category', [CategoryController::class, 'create'])->name('category.create');
            Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
            Route::get('/all-categories', [CategoryController::class, 'index'])->name('category.index');
            Route::get('/{id}/delete', [CategoryController::class, 'delete'])->name('category.delete');
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('/{id}/update', [CategoryController::class, 'update'])->name('category.update');
        });

        // subcategory
        Route::prefix('/subcategory')->group(function () {
            Route::get('/create-subcategory', [SubcategoryController::class, 'create'])->name('subcategory.create');
            Route::post('/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
            Route::get('/all-subcategories', [SubcategoryController::class, 'index'])->name('subcategory.index');
            Route::get('/{id}/delete', [SubcategoryController::class, 'delete'])->name('subcategory.delete');
            Route::get('/{id}/edit', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
            Route::post('/{id}/update', [SubcategoryController::class, 'update'])->name('subcategory.update');
        });

        // products
        Route::prefix('/product')->group(function () {
            Route::get('/create-product', [ProductController::class, 'create'])->name('product.create');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('/all-products', [ProductController::class, 'index'])->name('product.index');
            Route::get('/{id}/delete', [ProductController::class, 'delete'])->name('product.delete');
            Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
            Route::post('/{id}/update', [ProductController::class, 'update'])->name('product.update');
        });

        // appliances
        Route::prefix('/appliance')->group(function () {
            Route::get('/create-appliance', [ApplianceController::class, 'create'])->name('appliance.create');
            Route::post('/store', [ApplianceController::class, 'store'])->name('appliance.store');
            Route::get('/all-appliances', [ApplianceController::class, 'index'])->name('appliance.index');
            Route::get('/{id}/delete', [ApplianceController::class, 'delete'])->name('appliance.delete');
            Route::get('/{id}/edit', [ApplianceController::class, 'edit'])->name('appliance.edit');
            Route::post('/{id}/update', [ApplianceController::class, 'update'])->name('appliance.update');
        });

        // engineer
        Route::prefix('/engineer')->group(function () {
            Route::get('/create-engineer', [EngineerController::class, 'create'])->name('engineer.create');
            Route::post('/store', [EngineerController::class, 'store'])->name('engineer.store');
            Route::get('/all-engineers', [EngineerController::class, 'index'])->name('engineer.index');
            Route::get('/{id}/edit', [EngineerController::class, 'edit'])->name('engineer.edit');
            Route::get('/{id}/view', [EngineerController::class, 'view'])->name('engineer.view');
            Route::get('/{id}/delete', [EngineerController::class, 'delete'])->name('engineer.delete');
            Route::post('/{id}/update', [EngineerController::class, 'update'])->name('engineer.update');
        });


        // customer
        Route::prefix('/customer')->group(function () {
            Route::get('/create-customer', [CustomerController::class, 'create'])->name('customer.create');
            Route::post('/store', [CustomerController::class, 'store'])->name('customer.store');
            Route::get('/all-customers', [CustomerController::class, 'index'])->name('customer.index');
            Route::get('/{id}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
            Route::get('/{id}/delete', [CustomerController::class, 'delete'])->name('customer.delete');
            Route::post('/{id}/update', [CustomerController::class, 'update'])->name('customer.update');


            Route::get('/{id}/sale-to-solo-customer', [CustomerController::class, 'saleToSoloCustomerForm'])->name('customer.saleToSoloCustomerForm');
            Route::post('/sale-to-solo-customer/store', [CustomerController::class, 'saleToSoloCustomerStore'])->name('customer.saleToSoloCustomerStore');
            Route::get('/{id}/sale-to-group-customer', [CustomerController::class, 'saleToGroupCustomerForm'])->name('customer.saleToGroupCustomerForm');
            Route::post('/sale-to-group-customer/store', [CustomerController::class, 'saleToGroupCustomerStore'])->name('customer.saleToGroupCustomerStore');
        });

        // checklist
        Route::prefix('/checklist')->group(function () {
            Route::get('/create-checklist', [ChecklistController::class, 'create'])->name('checklist.create');
            Route::post('/store', [ChecklistController::class, 'store'])->name('checklist.store');
            Route::get('/all-checklists', [ChecklistController::class, 'index'])->name('checklist.index');
            Route::get('/{id}/edit', [ChecklistController::class, 'edit'])->name('checklist.edit');
            Route::get('/{id}/delete', [ChecklistController::class, 'delete'])->name('checklist.delete');
            Route::post('/{id}/update', [ChecklistController::class, 'update'])->name('checklist.update');
        });

        // sold product
        Route::prefix('/sold-product')->group(function () {
            Route::get('/all-products', [SellingProductController::class, 'index'])->name('sold_product.index');
            Route::get('/create-sold-product', [SellingProductController::class, 'create'])->name('sold_product.create');
            Route::post('/store', [SellingProductController::class, 'store'])->name('sold_product.store');
            Route::get('/{id}/edit', [SellingProductController::class, 'edit'])->name('sold_product.edit');
            Route::get('/{id}/delete', [SellingProductController::class, 'delete'])->name('sold_product.delete');
            Route::post('/{id}/update', [SellingProductController::class, 'update'])->name('sold_product.update');


            Route::get('/solo-customer-list', [SellingProductController::class, 'soloIndex'])->name('solo_sold_product.index');
            Route::get('/solo/{id}/view-products', [SellingProductController::class, 'viewSoloProduct'])->name('sold_product.viewSoloProduct');

            Route::get('/group-customer-list', [SellingProductController::class, 'groupIndex'])->name('group_sold_product.index');
            Route::get('/group/{id}/view-products', [SellingProductController::class, 'viewGroupProduct'])->name('sold_product.viewGroupProduct');
            Route::get('/group/{id}/branches', [SellingProductController::class, 'viewBranchGroup'])->name('sold_product.viewBranchGroup');
            Route::get('/group/{customer_id}/branch/{branch_d}/products', [SellingProductController::class, 'viewGroupBranchProducts'])->name('sold_product.viewGroupBranchProducts');
        });



        //////////////////////// service management ////////////////////

        // appiontment
        Route::prefix('/appiontment')->group(function () {
            Route::get('/make-an-appiontment-solo-customer/{soldProductId}', [AppiontmentController::class, 'appiontmentFormSoloCustomer'])->name('appiontment.appiontment_for_solo_customer');
            Route::get('/make-an-appiontment/{soldProductId}', [AppiontmentController::class, 'checkUserProductForm'])->name('appiontment.check_user_product_form');
            Route::get('/estimated_time/{appiontment_id}', [AppiontmentController::class, 'estimatedTimeCreate'])->name('appiontment.estimated_time');
            Route::post('/estimated_time/{appiontment_id}', [AppiontmentController::class, 'estimatedTimeStore'])->name('appiontment.estimated_time_store');

            Route::post('/appiontment/store', [AppiontmentController::class, 'appiontmentStore'])->name('appiontment.appiontment_store');


            Route::get('/all-appiontments-of-group-customer', [AppiontmentController::class, 'groupIndex'])->name('appiontment.group_index');
            Route::get('/all-appiontments-of-solo-customer', [AppiontmentController::class, 'soloIndex'])->name('appiontment.solo_index');
            Route::get('/assign-engineer/{id}/{productId}', [AppiontmentController::class, 'assignEngineer'])->name('appiontment.assign_engineer');
            Route::post('/assign-engineer/store', [AppiontmentController::class, 'assignEngineerStore'])->name('appiontment.assign_engineer_store');



            Route::get('/assigned-engineer-details/{id}', [AppiontmentController::class, 'assignedEngineerDetailed'])->name('appiontment.assigned_engineer_detailed');
            // inspection location
            Route::get('/inspection-location/{id}', [AppiontmentController::class, 'inspectionLocation'])->name('appiontment.inspection_location');
            // parts nedd
            Route::get('/parts-need/{id}', [AppiontmentController::class, 'partsNeed'])->name('appiontment.parts_need');
        });

        // service request
        Route::prefix('/service-request')->group(function () {
            Route::get('/solo/all-solo-request', [ServiceRequestController::class, 'allSoloRequest'])->name('service_request.all_solo_request');
            Route::get('/solo/take-appiontment/{soldProductId}/{serviceRequestId}', [ServiceRequestController::class, 'takeAppiontment'])->name('service_request.take_appiontment');
        });

        // checklist
        Route::prefix('/checklist')->group(function () {
            Route::get('/create-checklist', [ChecklistController::class, 'create'])->name('checklist.create');
            Route::post('/store', [ChecklistController::class, 'store'])->name('checklist.store');
            Route::get('/all-checklists', [ChecklistController::class, 'index'])->name('checklist.index');
            Route::get('/{id}/edit', [ChecklistController::class, 'edit'])->name('checklist.edit');
            Route::get('/{id}/delete', [ChecklistController::class, 'delete'])->name('checklist.delete');
            Route::post('/{id}/update', [ChecklistController::class, 'update'])->name('checklist.update');
            Route::get('/{id}/view', [ChecklistController::class, 'view'])->name('checklist.view');
        });
    });


});

Route::middleware(['customAuthCheck'])->group(function () {
    Route::get('/logout', [CustomeAuthController::class, 'logout'])->name('logout');
    // engineer
    Route::prefix('engineer')->group(function () {
        Route::get('/dashboard', [EngineerDashboardController::class, 'dashboard'])->name('engineer.dashboard');
        Route::get('/total-tasks', [EngineerEngineerController::class, 'totalTasks'])->name('engineer.total_tasks');
        Route::get('/total-tasks/details/{id}', [EngineerEngineerController::class, 'taskView'])->name('engineer.task_view');
        // start inspection (ajax)
        Route::post('/total-tasks/start-inspection', [EngineerEngineerController::class, 'startInspection'])->name('engineer.start_inspection');
        Route::post('/total-tasks/details/{id}/stop-inspection', [EngineerEngineerController::class, 'stopInspection'])->name('engineer.stop_inspection');
        Route::post('/total-tasks/details/{id}/complete-inspection', [EngineerEngineerController::class, 'completeTask'])->name('engineer.complete_task');

        // needed parts
        Route::post('/needed-parts/store', [EngineerEngineerController::class, 'neededParts'])->name('needed_parts.store');

    });

});



Route::middleware(['customAuthCheck'])->group(function () {
    Route::get('/logout', [CustomeAuthController::class, 'logout'])->name('logout');
    // customer
    Route::prefix('customer')->group(function () {
        Route::get('/dashboard', [CustomerDashboardController::class, 'dashboard'])->name('customer.dashboard');
        Route::get('/admin-contact', [CustomerCustomerController::class, 'adminContact'])->name('customer.admin_contact');
        Route::get('/purchased-products', [CustomerCustomerController::class, 'purchasedProducts'])->name('customer.purchased_products');
        Route::get('/service-requests', [CustomerCustomerController::class, 'allServiceRequests'])->name('customer.all_service_requests');
        Route::get('/purchased-products/request-service/{soldProductId}', [CustomerCustomerController::class, 'requestService'])->name('customer.request_service');
    });
});









Route::get('/test-form', [TestController::class, 'create'])->name('test.create');
Route::post('/test-form/store', [TestController::class, 'store'])->name('test.store');
Route::get('/decrypt', [TestController::class, 'decrypt'])->name('test.decrypt');


