<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CustomerAuth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Admin Panel

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');
Route::get('/add-vehicles', [App\Http\Controllers\CarController::class, 'add_vehicles'])->name('add-vehicles');
Route::post('/add-vehicles-save', [App\Http\Controllers\CarController::class, 'add_vehicles_save'])->name('add-vehicles-save');
Route::get('/view-vehicles', [App\Http\Controllers\CarController::class, 'view_vehicles'])->name('view-vehicles');
Route::get('/edit-vehicles/{id}', [App\Http\Controllers\CarController::class, 'edit_vehicles'])->name('edit-vehicles');
Route::post('/delete-vehicles', [App\Http\Controllers\CarController::class, 'vehicles_delete'])->name('delete-vehicles');

Route::get('/booking-requests', [App\Http\Controllers\BookingController::class, 'booking_requests'])->name('booking-requests');
Route::get('/confirmed-bookings', [App\Http\Controllers\BookingController::class, 'confirmed_bookings'])->name('confirmed-bookings');
Route::get('/completed-bookings', [App\Http\Controllers\BookingController::class, 'completed_bookings'])->name('completed-bookings');
Route::get('/rejected-bookings', [App\Http\Controllers\BookingController::class, 'rejected_bookings'])->name('rejected-bookings');
Route::post('/booking-request-status', [App\Http\Controllers\BookingController::class, 'booking_request_status'])->name('booking-request-status');

Route::get('/view-customers', [App\Http\Controllers\CustomersController::class, 'view_customers'])->name('view-customers');




// Website

Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\WebController::class, 'index'])->name('home');
Route::get('/view-cars', [App\Http\Controllers\WebController::class, 'view_cars'])->name('view-cars');
Route::get('/view-car-details/{id}', [App\Http\Controllers\WebController::class, 'view_car_details'])->name('view-car-details');
Route::get('/customer-login', [App\Http\Controllers\WebController::class, 'customer_login'])->name('customer-login');
Route::post('/customer-login-submit', [App\Http\Controllers\WebController::class, 'customer_login_submit'])->name('customer-login-submit');
Route::get('/customer-register', [App\Http\Controllers\WebController::class, 'customer_register'])->name('customer-register');
Route::post('/customer-register-submit', [App\Http\Controllers\WebController::class, 'customer_register_submit'])->name('customer-register-submit');

Route::middleware([CustomerAuth::class])->group(function (){
	Route::get('/my-bookings', [App\Http\Controllers\WebController::class, 'my_bookings'])->name('my-bookings');
	Route::get('/my-profile', [App\Http\Controllers\WebController::class, 'my_profile'])->name('my-profile');
	Route::post('/update-profile', [App\Http\Controllers\WebController::class, 'update_profile'])->name('update-profile');
	Route::get('/customer-logout', [App\Http\Controllers\WebController::class, 'customer_logout'])->name('customer-logout');
	Route::post('/book-car', [App\Http\Controllers\WebController::class, 'book_car'])->name('book-car');
});










