<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InventoryFeaturesController;
use App\Http\Controllers\InventoryDefinitionController;
use App\Http\Controllers\GsmAssignedController;
use App\Http\Controllers\GsmCategoryController;
use App\Http\Controllers\GsmPackageController;
use App\Http\Controllers\GsmPackageContentController;
use App\Http\Controllers\TeamController;

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {

    Route::resource("/category", ProductCategoryController::class);

    Route::resource("/inventory", ProductController::class);

    Route::resource("/user", UserController::class);

    Route::resource("/inventory-detail", InventoryFeaturesController::class);

    Route::resource("/gsm-package", GsmPackageController::class);

    Route::resource("/gsm-package-content", GsmPackageContentController::class);

    Route::resource("/gsm-category", GsmCategoryController::class);

    Route::resource("/gsm-assigned", GsmAssignedController::class);

    Route::delete('/gsm-assigned/{gsmAssigned}', 'GsmAssignedController@destroy')->name('gsm-assigned.destroy');


    Route::resource("/inventory-define", InventoryDefinitionController::class);

    Route::get('/resigned-users', [UserController::class, 'user_inactive']);

    Route::post('/remove_inventory', [UserController::class, 'remove_inventory']);

    Route::post('/remove_user', [UserController::class, 'remove_user']);

    Route::post('/add_user_again', [UserController::class, 'add_user_again']);

    Route::post('/inventory_inactive', [ProductController::class, 'inventory_inactive']);

    Route::get('/user/inventory-history/{id}', [UserController::class, 'view_inventory']);

    Route::get('/user/assignment/{id}', [UserController::class, 'create_pdf']);

    Route::resource("/team", TeamController::class);

    Route::post('/team_delete', [TeamController::class, 'team_delete']);

    Route::post('/gsm_remove', [GsmAssignedController::class, 'gsm_remove']);

    Route::post('get-gsm-package-content', [GsmAssignedController::class, 'getGsmPackageContent']);

    Route::post('/gsm_content_remove', [GsmPackageController::class, 'gsm_content_remove']);

    Route::post('/gsm_package_remove', [GsmPackageController::class, 'gsm_package_remove']);


    //UPDATE METHODS
    Route::get('/dashboard/profile/edit', function () {
        return view('profile-edit');
    });

    //LISTING METHODS
    Route::get('/dashboard/profile', function () {
        return view('profile');
    });

    Route::get('/inventory-detail/create/{id}', [App\Http\Controllers\InventoryFeaturesController::class, 'create'])->name('inventory-detail');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
