<?php

use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\AdminVendorProfileController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ChildCategoriesController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\FlashSaleController;
use App\Http\Controllers\Backend\HomePageSettingController;
use App\Http\Controllers\Backend\ManageUserController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductImageGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\ShippingRuleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\SubCategoriesController;
use App\Http\Controllers\Backend\TermsAndConditionsController;
use App\Http\Controllers\Backend\TrasnactionController;
use Illuminate\Support\Facades\Route;

/**  ADMIN ROUTES */
Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
// Route::get('admin/dashboard',[AdminController::class,'dashboard'])->middleware(['auth','role:admin'])->name('admin.dashboard');

/**  Profile routes */
Route::get('profile', [ProfileController::class, 'index'])->name('profile');

Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

Route::post('profile/update/password', [ProfileController::class, 'updatePassword'])->name('password.update');

/**  Slider Routes */
Route::resource('slider', SliderController::class);


/**  Category Routes */
Route::put('change-status', [CategoryController::class, 'changeStauts'])->name('category.change-status');

Route::resource('category', CategoryController::class);

/**  Sub-Category Routes */
Route::put('subcategory/change-status', [SubCategoriesController::class, 'changeStauts'])->name('sub-category.change-status');

Route::resource('sub-category', SubCategoriesController::class);

/**  Child-Category Routes */
Route::put('child-category/change-status', [ChildCategoriesController::class, 'changeStauts'])->name('child-category.change-status');

Route::get('get-subcategories', [ChildCategoriesController::class, 'getSubCategories'])->name('get-subcategories');

Route::resource('child-category', ChildCategoriesController::class);

/** Brand Routes */
Route::put('brand/change-status', [BrandController::class, 'changeStauts'])->name('brand.change-status');

Route::resource('brand', BrandController::class);

/** Vendor-Profile Routes */
Route::resource('vendor-profile', AdminVendorProfileController::class);

/** Product Routes */
Route::put('product/change-status', [ProductController::class, 'changeStauts'])->name('product.change-status');

Route::get('product/get-sub-categories', [ProductController::class, 'getSubCategories'])->name('product.get-sub-categories');

Route::get('product/get-child-categories', [ProductController::class, 'getChildCategories'])->name('product.get-child-categories');

Route::resource('product', ProductController::class);


/** Product Image Gallery Routes */
Route::resource('product-image-gallery', ProductImageGalleryController::class);
//in resource controller i cant use /


/** Product Variant Routes */
Route::put('product-variant/change-status', [ProductVariantController::class, 'changeStauts'])->name('product-variant.change-status');

Route::resource('product-variant', ProductVariantController::class);

/** Product Variant Item Routes */
Route::get('product-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('product-variant-item.index');

Route::get('product-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])->name('product-variant-item.create');

Route::post('product-variant-item', [ProductVariantItemController::class, 'store'])->name('product-variant-item.store');

Route::get('product-variant-item-edit/{variantItemId}', [ProductVariantItemController::class, 'edit'])->name('product-variant-item.edit');

Route::put('product-variant-item-update/{variantItemId}', [ProductVariantItemController::class, 'update'])->name('product-variant-item.update');

Route::delete('product-variant-item/{variantId}', [ProductVariantItemController::class, 'destroy'])->name('product-variant-item.destroy');

Route::get('product-variant-item-status', [ProductVariantItemController::class, 'chanegStatus'])->name('product-variant-item.change-status');


/** Flash Sale Routes */
Route::get('flash-sale', [FlashSaleController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale', [FlashSaleController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product', [FlashSaleController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-at-home', [FlashSaleController::class, 'changeShowAtHome'])->name('flash-sale.show-at-home');
Route::put('flash-sale/change-status', [FlashSaleController::class, 'changeStatus'])->name('flash-sale.change-status');
Route::delete('flash-sale/{id}', [FlashSaleController::class, 'destroy'])->name('flash-sale.destroy');

/** Coupon Routes */
Route::put('coupon/change-status', [CouponController::class, 'changeStatus'])->name('coupon.change-status');
Route::resource('coupon', CouponController::class);


/** Shipping Routes */
Route::put('shipping-rule/change-status', [ShippingRuleController::class, 'changeStatus'])->name('shipping-rule.change-status');
Route::resource('shipping-rule', ShippingRuleController::class);



/** Settings Routes */
Route::get('settings', [SettingController::class, 'index'])->name('setting.index');
Route::put('general-setting-update', [SettingController::class, 'generalSettingUpdate'])->name('setting.generalSettingUpdate');


/** Home page setting routes */
Route::get('home-page-setting', [HomePageSettingController::class, 'index'])->name('home-page-setting');
Route::put('popular-category-section', [HomePageSettingController::class, 'updatePopularCategorySection'])->name('popular-category-section');


/** Order Routes */
Route::get('order-status', [OrderController::class, 'changeOrderStatus'])->name('order.status');
Route::get('payment-status', [OrderController::class, 'changePaymentStatus'])->name('payment.status');
Route::get('pending-orders', [OrderController::class, 'pendingOrders'])->name('pending-orders');
Route::get('processed-orders', [OrderController::class, 'processedOrders'])->name('processed-orders');
Route::get('shipped-orders', [OrderController::class, 'shippedOrders'])->name('shipped-orders');
Route::get('deliverd-orders', [OrderController::class, 'deliverdOrders'])->name('deliverd-orders');
Route::get('canceld-orders', [OrderController::class, 'canceldOrders'])->name('canceld-orders');

Route::resource('order',OrderController::class);

/** Transaction Routes */
Route::get('transaction', [TrasnactionController::class, 'index'])->name('transaction');


/** About routes */
Route::get('about',[AboutController::class, 'index'])->name('about.index');
Route::put('about/update',[AboutController::class, 'update'])->name('about.update');

/** Terms and Conditions routes */
Route::get('termsAndConditions',[TermsAndConditionsController::class, 'index'])->name('terms.index');
Route::put('termsAndConditions/update',[TermsAndConditionsController::class, 'update'])->name('terms.update');


/** manage user routes */

Route::get('manage-user',[ManageUserController::class, 'index'])->name('manage-user');
Route::post('manage-user',[ManageUserController::class, 'create'])->name('manage-user.create');
