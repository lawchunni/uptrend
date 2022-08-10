<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\OrderController;

Route::get('/cart', [CartController::class, 'index'])->name('cartIndex');
Route::get('/cart/add/{id}', [CartController::class, 'create'])->name('createCart');
Route::get('/cart/edit', [CartController::class, 'edit'])->name('updateCart');


Route::middleware(['auth'])->group(function () {
    /**
     *  Cart and checkout routes
     */
    Route::get('/cart/checkout', [CheckoutController::class, 'checkoutCart'])->name('checkoutCart');
    Route::get('/cart/address/update', [CheckoutController::class, 'updateShippingAddress'])->name('updateShippingAddress');
    Route::get('/cart/billing', [CheckoutController::class, 'processToBilling'])->name('processToBilling');
    Route::get('/cart/billing/use-shipping', [CheckoutController::class, 'useShippingAsBilling'])->name('useShippingAsBilling');
    Route::get('/cart/billing/credit-card', [CheckoutController::class, 'showCreditCardForm'])->name('showCreditCardForm');
    Route::post('/cart/order', [CheckoutController::class, 'storeOrder'])->name('storeOrder');
});

Route::middleware(['auth', 'admin'])->group(function () {

    // Admin Order Route
    Route::get('/admin/order', [OrderController::class, 'index'])
        ->name('admin_order_list');
    Route::put('/admin/order/{order}', [OrderController::class, 'update'])
        ->name('admin_order_update');

    // Admin Tax Route
    Route::get('/admin/tax', [TaxController::class, 'index'])
        ->name('adminTaxIndex');
    Route::get('/admin/tax/create', [TaxController::class, 'create'])->name('adminTaxCreate');
    Route::post('/admin/tax', [TaxController::class, 'store'])->name('adminTaxStore');
    Route::get('/admin/tax/edit/{tax}', [TaxController::class, 'edit'])->name('adminTaxEdit');
    Route::put('/admin/tax/{id}', [TaxController::class, 'update'])->name('adminTaxUpdate');
    Route::delete('/admin/tax/{id}', [TaxController::class, 'destroy'])->name('adminTaxDestroy');
});
