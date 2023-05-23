<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot-password');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');

    Route::resource('/customers', App\Http\Controllers\CustomerController::class)->names([
        'index' => 'customers.index',
        'create' => 'customers.create',
        'store' => 'customers.store',
        'show' => 'customers.show',
        'edit' => 'customers.update',
        'destroy' => 'customers.destroy',
    ]);
    Route::get('/customers-menu', function () {
        return view('customers.menu');
    });
    
    Route::resource('/bookings', App\Http\Controllers\BookingController::class)->names([
        'index' => 'bookings',
        'create' => 'bookings.create',
        'store' => 'bookings.store',
        'show' => 'bookings.show',
        'edit' => 'bookings.update',
        'destroy' => 'bookings.destroy',
    ]);
    
    Route::get('/business-menu', function () {
        return view('business.menu');
    });
    Route::get('/business-preferences', [App\Http\Controllers\BusinessController::class, 'index'])->name('business-settings'); 

    Route::get('/business-hours', [App\Http\Controllers\WorkhourController::class, 'index']); 
    Route::patch('/business-hours', [App\Http\Controllers\WorkhourController::class, 'store'])->name('workhours');  
    Route::patch('/business-update', [App\Http\Controllers\BusinessController::class, 'update'])->name('update_business_settings');  
    
    Route::resource('/business', App\Http\Controllers\BusinessController::class)->names([
        'index' => 'business.preferences',
        'create' => 'business.create',
        'store' => 'business.store',
        'show' => 'business.show',
        'edit' => 'business.update',
        'destroy' => 'business.destroy',
    ]);

    Route::resource('/reviews', App\Http\Controllers\ReviewController::class)->names([
        'index' => 'reviews',
        'create' => 'reviews.create',
        'store' => 'reviews.store',
        'show' => 'reviews.show',
        'edit' => 'reviews.update',
        'destroy' => 'reviews.destroy',
    ]);
    Route::get('/reviews-menu', [App\Http\Controllers\ReviewController::class, 'menu']);
    Route::get('/reviews-pending', [App\Http\Controllers\ReviewController::class, 'pending']);
    
    Route::resource('/services', App\Http\Controllers\ServiceController::class)->names([
        'index' => 'services',
        'create' => 'services.create',
        'store' => 'services.store',
        'show' => 'services.show',
        'edit' => 'services.update',
        'destroy' => 'services.destroy',
    ]);
    Route::get('/services-menu', function () {
        return view('services.menu');
    });

    Route::resource('/settings', App\Http\Controllers\ReviewController::class)->names([
        'index' => 'settings',
        'create' => 'settings.create',
        'store' => 'settings.store',
        'show' => 'settings.show',
        'edit' => 'settings.update',
        'destroy' => 'settings.destroy',
    ]);
    
    Route::get('/profile', function () {
        return view('profile')->name('profile');
    });
        
    Route::get('/tables', function () {
        return view('tables');
    });
    
    Route::get('/forms', function () {
        return view('forms');
    });
    
    Route::get('/calendar', function () {
        return view('calendar.index');
    });

    Route::get('/profile', function () {
        return view('profile');
    });
});
