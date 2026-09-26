<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CategoriesController;
use App\Http\Controllers\Dashboard\StoreController;
use App\Http\Controllers\Dashboard\TwoFactorAuthenticatableController;
use App\Http\Controllers\Dashboard\HrController;
use App\Http\Controllers\Dashboard\HrDepartmentsController;
use App\Http\Controllers\Dashboard\HrEmployeesController;
Route::group([
    'prefix' => '/admin/dashboard',
    'as' => 'dashboard.',
    'middleware' => ['auth:admin']
], function () {

    Route::get('/index', [DashboardController::class, 'index'])
        ->name('index');
    Route::get('/categories', [CategoriesController::class, 'index'])
        ->name('categories.index');
    Route::get('/categories/create', [CategoriesController::class, 'create'])
        ->name('categories.create');
    Route::post('/categories/store', [CategoriesController::class, 'store'])
        ->name('categories.store');
    Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])
        ->name('categories.edit');
    Route::get('/categories/show/{id}', [CategoriesController::class, 'show'])
        ->name('categories.show');
    Route::put('/categories/update/{id}', [CategoriesController::class, 'update'])
        ->name('categories.update');
    Route::delete('/categories/delete/{id}', [CategoriesController::class, 'destroy'])
        ->name('categories.destroy');
    Route::get('/categories/{category}/products', [CategoriesController::class, 'products'])
        ->name('categories.products');

    Route::resource('stores', StoreController::class);
    Route::resource('products', ProductsController::class);
    Route::get('/2fa', [TwoFactorAuthenticatableController::class, 'index'])->name('admin.2fa');
    Route::prefix('hr')->name('hr.')->group(function () {
        Route::get('/', [HrController::class, 'index'])->name('index');
        Route::resource('departments', HrDepartmentsController::class); // dashboard.hr.departments.index
        Route::resource('employees', HrEmployeesController::class);
    });
});
