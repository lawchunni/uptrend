<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\OrderHistoryController;
use App\Http\Controllers\Admin\UserAddressController as AdminUserAddressController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Admin\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// default home page
Route::get('/', [HomeController::class, 'index']);

Auth::routes();

// default home page with /home path
Route::get('/home', [HomeController::class, 'index'])->name('home');

/*
---------  Admin User Routes -------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {

    // admin dashboard start
    Route::get('/admin/', function () {
        return redirect('/admin/dashboard');
    });
    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])
        ->name('admin_dashboard');
    // admin dashboard end

    // product start
    Route::get('/admin/product', [App\Http\Controllers\Admin\ProductController::class, 'index'])
        ->name('admin_product_list');
    Route::get('/admin/product/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])
        ->name('admin_product_add');
    Route::post('/admin/product', [App\Http\Controllers\Admin\ProductController::class, 'store'])
        ->name('admin_product_save');
    Route::get('/admin/product/edit/{product}', [App\Http\Controllers\Admin\ProductController::class, 'edit'])
        ->name('admin_product_edit');
    Route::put('/admin/product/{product}', [App\Http\Controllers\Admin\ProductController::class, 'update'])
        ->name('admin_product_update');
    Route::delete('/admin/product/{product}', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])
        ->name('admin_product_delete');
    Route::delete('/admin/product/media/{media}', [App\Http\Controllers\Admin\ProductController::class, 'deleteMedia'])
        ->name('admin_product_media_delete');
    // product end

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

/*
 ---------  Auth User Routes -------------------------------------------
 */
Route::middleware(['auth'])->group(function () {
    /**
     *  Cart and checkout routes
     */
    Route::get('/cart/checkout', [CheckoutController::class, 'checkoutCart'])->name('checkoutCart');
    Route::get('/cart/address/update', [CheckoutController::class, 'updateShippingAddress'])->name('updateShippingAddress');
    Route::get('/cart/billing', [CheckoutController::class, 'processToBilling'])->name('processToBilling');
    Route::get('/cart/billing/shipping', [CheckoutController::class, 'useShippingAsBilling'])->name('useShippingAsBilling');
    Route::get('/cart/billing/card', [CheckoutController::class, 'showCreditCardForm'])->name('showCreditCardForm');
    Route::post('/cart/order', [CheckoutController::class, 'storeOrder'])->name('storeOrder');

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
 ---------  Normal User Routes -------------------------------------------
 */

Route::get('/product', [ProductController::class, 'index'])
    ->name('product_list');
Route::get('/product/{slug}', [ProductController::class, 'show'])
    ->name('product_detail');
Route::get('/{gender}/product', [ProductController::class, 'genderFilter'])
    ->name('gender_product_list');
Route::get('/cart', [CartController::class, 'index'])->name('cartIndex');
Route::get('/cart/add/{id}', [CartController::class, 'create'])->name('createCart');
Route::get('/cart/edit', [CartController::class, 'edit'])->name('updateCart');
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/terms-and-conditions', [TermsController::class, 'index']);
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index']);

Route::fallback([App\Http\Controllers\PageNotFoundController::class, 'notfound']);
