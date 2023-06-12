<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripePaymentController;
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

Route::get('/', [HomeController::class, 'Homepage'])->name('home');
Route::get('about-us', [HomeController::class, 'index'])->name('aboutus');
Route::get('/shop', [HomeController::class, 'shop_page'])->name('shop');
Route::get('/single-product/{id}', [HomeController::class, 'single_product'])->name('single.product');
Route::post('/contact-us', [ContactusController::class, 'store'])->name('contact-us-form');
Route::get('/contact-us', [ContactusController::class, 'append_conatact_us_form'])->name('contactusform');
Route::resource('cart', CartController::class);
Route::post('api/fetch-states', [CheckoutController::class, 'fetchState'])->name('fetch_state');
Route::post('api/fetch-states', [CheckoutController::class, 'fetchState'])->name('fetch_state');
Route::post('api/fetch-cities', [CheckoutController::class, 'fetchCity'])->name('fetch_cities');
Route::post('api/fetch_selected_state_countries', [CheckoutController::class, 'fetch_selected_state_countries'])->name('fetch_selected_state_countries');
// USer Routes
require __DIR__.'/userauth.php';


// Admin Routes
require __DIR__.'/adminauth.php';

