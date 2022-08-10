<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageNotFoundController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\ShippingChargeController;

/*
 ---------  Normal User Routes -------------------------------------------
 */

Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/terms-and-conditions', [TermsController::class, 'index']);
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index']);

/*
---------  Admin User Routes -------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {

    //Category Controller CRUD
    Route::get('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('/admin/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('/admin/category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('/admin/category/edit/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('/admin/category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    Route::delete('/admin/category/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);

    // Inquiry Controller
    Route::get('/admin/inquiry', [App\Http\Controllers\Admin\InquiryController::class, 'index']);
    Route::delete('/admin/inquiry/{id}', [App\Http\Controllers\Admin\InquiryController::class, 'destroy']);

    // Advertisement Controller CRUD
    Route::get('/admin/advertisement', [App\Http\Controllers\Admin\AdvertisementController::class, 'index']);
    Route::get('/admin/advertisement/create', [App\Http\Controllers\Admin\AdvertisementController::class, 'create']);
    Route::post('/admin/advertisement', [App\Http\Controllers\Admin\AdvertisementController::class, 'store']);
    Route::get('/admin/advertisement/edit/{advertisement}', [App\Http\Controllers\Admin\AdvertisementController::class, 'edit']);
    Route::put('/admin/advertisement/{id}', [App\Http\Controllers\Admin\AdvertisementController::class, 'update']);
    Route::delete('/admin/advertisement/{id}', [App\Http\Controllers\Admin\AdvertisementController::class, 'destroy']);

    //Shipping charge CRUD
    Route::get('/admin/shipping-charge', [App\Http\Controllers\Admin\ShippingChargeController::class, 'index']);
    Route::get('/admin/shipping-charge/create', [App\Http\Controllers\Admin\ShippingChargeController::class, 'create']);
    Route::post('/admin/shipping-charge', [App\Http\Controllers\Admin\ShippingChargeController::class, 'store']);
    Route::get('/admin/shipping-charge/edit/{shippingcharge}', [App\Http\Controllers\Admin\ShippingChargeController::class, 'edit']);
    Route::put('/admin/shipping-charge/{id}', [App\Http\Controllers\Admin\ShippingChargeController::class, 'update']);
    Route::delete('/admin/shipping-charge/{id}', [App\Http\Controllers\Admin\ShippingChargeController::class, 'destroy']);
});

Route::fallback([App\Http\Controllers\PageNotFoundController::class, 'notfound']);
