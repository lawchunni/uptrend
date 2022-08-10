<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\OrderHistoryController;
use App\Http\Controllers\Admin\UserAddressController as AdminUserAddressController;

/*
 ---------  Normal User Routes -------------------------------------------
 */

Route::middleware(['auth'])->group(function () {
    // profile page
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit/{user}', [ProfileController::class, 'edit'])->name('profile-edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update']);
    //user address
    Route::get('/address/edit/{user_address}', [UserAddressController::class, 'edit'])->name('address-edit');
    Route::put('/address/{id}', [UserAddressController::class, 'update']);
    Route::delete('/address/{id}', [UserAddressController::class, 'destroy']);
    Route::get('/address/create', [UserAddressController::class, 'create'])->name('address_add');
    Route::post('/address', [UserAddressController::class, 'store']);
    Route::put('/default-address/{id}', [UserAddressController::class, 'updateDefaultAddress']);
    // order history
    Route::get('/order-history', [OrderHistoryController::class, 'index'])->name('order-history');
    Route::get('/order-history/{id}', [OrderHistoryController::class, 'show'])->name('order-history-detail');
    Route::get('/order-history/invoice/{id}', [OrderHistoryController::class, 'invoice'])->name('order-history-invoice');
});

/*
---------  Admin User Routes -------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    // admin user 
    Route::get('/admin/user', [UserController::class, 'index']);
    Route::get('/admin/user/edit/{user}', [UserController::class, 'edit'])->name('admin_user_edit');
    Route::put('/admin/user/{id}', [UserController::class, 'update']);
    Route::delete('/admin/user/{id}', [UserController::class, 'destroy']);
    // admin user address
    Route::get('/admin/address', [AdminUserAddressController::class, 'index']);
    Route::get('/admin/address/edit/{address}', [AdminUserAddressController::class, 'edit'])->name('admin_address_edit');
    Route::delete('/admin/address/{id}', [AdminUserAddressController::class, 'destroy']);
    Route::put('/admin/default-address/{id}', [AdminUserAddressController::class, 'updateDefaultAddress']);
    Route::put('/admin/address/{id}', [AdminUserAddressController::class, 'update']);
});
