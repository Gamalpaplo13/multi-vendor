<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CheckoutController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\OrderTrackController;
use App\Http\Controllers\Frontend\UserAddressController;
use App\Http\Controllers\Frontend\UserDashboardController;
use App\Http\Controllers\Frontend\UserOrderController;
use App\Http\Controllers\Frontend\UserProfileController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');


Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale');

/** Product Detail Route */
Route::get('product-detail/{slug}', [FrontendProductController::class, 'showProduct'])->name('product-detail');


/** Product Routes */
Route::get('products', [FrontendProductController::class, 'productsIndex'])->name('products.index');
Route::get('change-product-list-view', [FrontendProductController::class, 'changeListView'])->name('change-product-list-view');


/**  cart Routes */
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('cart/update-quantity', [CartController::class, 'updateProductQuantity'])->name('cart.update-quantity');
Route::get('cart/clear-cart', [CartController::class, 'clearCart'])->name('cart.clear-cart');
Route::get('cart/remove-product/{rowId}', [CartController::class, 'removeProduct'])->name('cart.remove-product');
Route::get('cart-count', [CartController::class, 'getCartCount'])->name('cart.cart-count');
Route::get('cart-products', [CartController::class, 'getCartProducts'])->name('cart.cart-prosucts');
Route::post('cart/remove-siderbar-product', [CartController::class, 'removeSidebarProduct'])->name('cart.remove-siderbar-product');
Route::get('cart/siderbar-product-total', [CartController::class, 'cartTotal'])->name('cart.siderbar-product-total');

Route::get('cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.apply-coupon');
Route::get('coupon-calculation', [CartController::class, 'couponCalculation'])->name('cart.coupon-calculation');


/** Order Routes */
Route::get('user-orders', [UserOrderController::class, 'index'])->name('order.index');
Route::get('order/show/{id}',[UserOrderController::class,'show'])->name('order.show');

/**about routes */
Route::get('about',[AboutController::class, 'about'])->name('about');

/**Terms and Conditions routes */
Route::get('TermsAndConditions',[AboutController::class, 'termsAndConditions'])->name('terms');

/**Contact routes */
Route::get('contact',[AboutController::class, 'contact'])->name('contact');
Route::post('contact',[AboutController::class, 'handleContactForm'])->name('handle-contact-form');

/** Order Track Routes */
Route::get('order-tracking',[OrderTrackController::class, 'index'])->name('order-tracking.index');

// Route::get('/dashboard', function () {
//     return view('frontend.dashboard.dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
    Route::get('profile', [UserProfileController::class, 'index'])->name('profile');
    Route::put('profile', [UserProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile', [UserProfileController::class, 'updatePassword'])->name('profile.update.password');

    /**Wishlist */
    Route::get('wishlist',[WishlistController::class,'index'])->name('wishlist.index');
    Route::get('wishlist/add-product',[WishlistController::class,'addToWishlist'])->name('wishlist.store');
    Route::get('wishlist/remove-product/{id}',[WishlistController::class,'removeFromWishlist'])->name('wishlist.destroy');

    /** User Address */
    Route::resource('address', UserAddressController::class);

    /** Checkout */
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout');
    Route::post('checkout/address', [CheckoutController::class, 'createAddress'])->name('checkout.address.create');
    Route::post('checkout/form-submit', [CheckoutController::class, 'checkoutFormSubmit'])->name('checkout.form-submit');

    /** Payment */
    Route::get('payment', [PaymentController::class, 'cashOnDelivery'])->name('payment-success');
    Route::get('payment-success', [PaymentController::class, 'index'])->name('payment');
});
