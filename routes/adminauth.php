<?php

 use App\Http\Controllers\AdminAuth\Auth\AuthenticatedSessionController;
 use App\Http\Controllers\AdminAuth\Auth\ConfirmablePasswordController;
use App\Http\Controllers\AdminAuth\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\AdminAuth\Auth\EmailVerificationPromptController;
use App\Http\Controllers\AdminAuth\Auth\NewPasswordController;
use App\Http\Controllers\AdminAuth\Auth\PasswordController;
use App\Http\Controllers\AdminAuth\Auth\PasswordResetLinkController;
use App\Http\Controllers\AdminAuth\Auth\VerifyEmailController;
use App\Http\Controllers\AdminAuth\Admindashboard;
use App\Http\Controllers\AdminAuth\CatagoryController;
use App\Http\Controllers\AdminAuth\SubcatagoryController;
use App\Http\Controllers\AdminAuth\ProductController;
use App\Http\Controllers\AdminAuth\ProfileController;
use App\Http\Controllers\AdminAuth\SiteSettingController;
use App\Http\Controllers\AdminAuth\CustomerDetailsController;
use App\Http\Controllers\AdminAuth\ServiceController;
use App\Http\Controllers\AdminAuth\HomeController;
use App\Http\Controllers\AdminAuth\CouponController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\AdminAuth\ShippingController;

use Illuminate\Support\Facades\Route;
    Route::namespace('AdminAuth')->prefix('admin')->name('admin.')->group(function(){
        Route::namespace('Auth')->middleware('guest:admin')->group(function(){
    Route::get('login', [AuthenticatedSessionController::class, 'create']) ->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->name('adminlogin');
});



Route::middleware('admin')->group(function(){
    Route::get('', [Admindashboard::class, 'dashboard']) ->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'view'])->name('profile');
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');



    // Catagory Routes
    Route::prefix('category')->group(function () {
        Route::get('/all', [CatagoryController::class, 'index'])->name('all.category');
        Route::get('/add', [CatagoryController::class, 'create'])->name('add.category');
        Route::post('/store', [CatagoryController::class, 'store'])->name('store.category');
        Route::get('/edit/{id}', [CatagoryController::class, 'edit'])->name('edit.category');
        Route::post('/update', [CatagoryController::class, 'update'])->name('update.category');
        Route::get('/delete/{id}', [CatagoryController::class, 'destroy'])->name('delete.category');
    });

    // Subcatagory Routes
    Route::prefix('subcategory')->group(function () {
        Route::get('/all', [SubcatagoryController::class, 'index'])->name('all.subcategory');
        Route::get('/add', [SubcatagoryController::class, 'create'])->name('add.subcategory');
        Route::post('/store', [SubcatagoryController::class, 'store'])->name('store.subcategory');
        Route::get('/edit/{id}', [SubcatagoryController::class, 'edit'])->name('edit.subcategory');
        Route::post('/update', [SubcatagoryController::class, 'update'])->name('update.subcategory');
        Route::get('/delete/{id}', [SubcatagoryController::class, 'destroy'])->name('delete.subcategory');
    });
    // Product Routes
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('all.product');
        Route::get('/add', [ProductController::class, 'create'])->name('add.product');
        Route::post('/store', [ProductController::class, 'store'])->name('store.product');
        Route::POST('subcatories', [ProductController::class, 'loadSubCategories'])->name('fetch.catagotries');
        Route::get('{id}/edit', [ProductController::class, 'edit'])->name('edit.product');
        Route::post('/update', [ProductController::class, 'update'])->name('update.product');
        Route::get('/delete/{id}', [ProductController::class, 'destroy'])->name('delete.product');
    });
    Route::prefix('services')->group(function () {
        Route::get('/all', [ServiceController::class, 'index'])->name('all.services');
        Route::get('/add', [ServiceController::class, 'create'])->name('add.services');
        Route::post('/store', [ServiceController::class, 'store'])->name('store.services');
         Route::get('/edit/{id}/edit', [ServiceController::class, 'edit'])->name('edit.services');
             Route::post('/update', [ServiceController::class, 'update'])->name('update.services');
            Route::get('/delete/{id}', [ServiceController::class, 'destroy'])->name('delete.services');
      });
      Route::prefix('shipping')->group(function () {
        Route::get('/', [ShippingController::class, 'index'])->name('shipping.index');
        Route::get('/create', [ShippingController::class, 'create'])->name('shipping.create');
        Route::post('/create', [ShippingController::class, 'create'])->name('shipping.store');
      });
            Route::prefix('customers')->group(function () {
        Route::get('/', [CustomerDetailsController::class, 'fetch_user_details'])->name('view.customers');
      });
    //   Route::resource('shipping', ShippingController::class);
  Route::resource('coupon', CouponController::class);

      Route::prefix('contact')->group(function () {
        Route::get('/all', [ContactusController::class, 'view_contact_details'])->name('view.contact');
      });

      Route::resource('setting',SiteSettingController::class);
      Route::get('/payment-method', [HomeController::class,'append_payment_method'])->name('paymentmethod');
});
});

// // Route::namespace('AdminAuth')->prefix('admin')->name('admin.')->group(function(){
// //     Route::namespace('Auth')->middleware('guest:admin')->group(function(){
//     // Route::namespace('Auth')->group(['middilewere'=>['guest:admin'],'prefix'=>'admin','as'=>'admin.'],function(){
//         Route::get('login', [AuthenticatedSessionController::class, 'create']) ->name('login');
//         Route::post('login', [AuthenticatedSessionController::class, 'store']);
//     });
//


// });
//     Route::group(['middilewere'=>['guest:admin'],'prefix'=>'admin','as'=>'admin.'],function(){
//        Route::get('login', [AuthenticatedSessionController::class, 'create']) ->name('login');
//     Route::post('login', [AuthenticatedSessionController::class, 'store']);

//         Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
//                 ->name('password.request');

//     Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
//                 ->name('password.email');

//     Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
//                 ->name('password.reset');

//     Route::post('reset-password', [NewPasswordController::class, 'store'])
//                 ->name('password.store');


// // subcategory Route








//   Route::get('/profile', [ProfileController::class, 'view'])->name('profile');
//   Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::resource('setting',SiteSettingController::class);
//     Route::get('/payment-method', [HomeController::class,'append_payment_method'])->name('paymentmethod');
//     Route::POST('/store', [HomeController::class,'store'])->name('payment-method-update');


//
//

//     });


// Route::group(['middilewere'=>['guest:admin'],'prefix'=>'admin','as'=>'admin.'],function(){

//     Route::get('verify-email', EmailVerificationPromptController::class)
//                 ->name('verification.notice');

//     Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
//                 ->middleware(['signed', 'throttle:6,1'])
//                 ->name('verification.verify');

//     Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
//                 ->middleware('throttle:6,1')
//                 ->name('verification.send');

//     Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
//                 ->name('password.confirm');

//     Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

//     Route::put('password', [PasswordController::class, 'update'])->name('password.update');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
// });
