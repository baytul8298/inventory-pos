<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\purchase\ProductController;
use App\Http\Controllers\purchase\CategoryController;
use App\Http\Controllers\purchase\UnitController;
use App\Http\Controllers\purchase\BrandController;
use App\Http\Controllers\purchase\WarrantyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware(['IsUnauthticate','IsAuthenticate']);


Route::middleware(['auth', 'verified', 'IsAuthenticate'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/branch-access', [AdminDashboardController::class, 'branchAccess'])->name('branch_access');

    ##################### Purchase ####################
    Route::get('/module/purchase', [AdminDashboardController::class, 'purchaseModule'])->name('purchase.module');

    // Units
    Route::resource('units', UnitController::class);
    Route::get('unit/datatable', [UnitController::class, 'datatable'])->name('unit.datatable');

    // Category
    Route::resource('categories', CategoryController::class);
    Route::get('category/datatable', [CategoryController::class, 'datatable'])->name('category.datatable');

    // Brand WarrantyController
    Route::resource('brands', BrandController::class);
    Route::get('brand/datatable', [BrandController::class, 'datatable'])->name('brand.datatable');

    // Warranty 
    Route::resource('warranties', WarrantyController::class);
    Route::get('warranty/datatable', [WarrantyController::class, 'datatable'])->name('warranty.datatable');
    
    // Products
    Route::resource('products', ProductController::class);
    Route::get('product/datatable', [ProductController::class, 'datatable'])->name('product.datatable');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';