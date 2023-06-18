<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\InteractionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadHandoffController;
use App\Http\Controllers\PipelineController;

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

//authentication routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [App\Http\Controllers\UserController::class, 'login'])->name('login');
Route::post('/register', [App\Http\Controllers\UserController::class, 'register'])->name('register');
Route::post('/create-business', [App\Http\Controllers\BusinessController::class, 'store'])->name('business');
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

//invitation link routes
Route::post('/invite', [App\Http\Controllers\InvitationController::class, 'check'])->name('invite_check');
Route::get('/invite', function () {
    return view('auth.invite');
})->name('invite');

Route::get('/create-business', function () {
    return view('auth.business');
})->name('business');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->name('forgot-password');

//customer views
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
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
    Route::get('/customers-manager', function () {
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
    
    Route::get('/business-manager', function () {
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
    Route::get('/reviews-manager', [App\Http\Controllers\ReviewController::class, 'menu']);
    Route::get('/reviews-pending', [App\Http\Controllers\ReviewController::class, 'pending']);
    
    Route::resource('/services', App\Http\Controllers\ServiceController::class)->names([
        'index' => 'services',
        'create' => 'services.create',
        'store' => 'services.store',
        'show' => 'services.show',
        'edit' => 'services.update',
        'destroy' => 'services.destroy',
    ]);
    Route::get('/services-manager', function () {
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

//Admin Routes
Route::middleware('role:admin')->group(function () {
    
    // Contacts routes
    Route::get('/contacts-manager', [ContactController::class, 'menu'])->name('contacts.menu');
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/{id}', [ContactController::class, 'show'])->name('contacts.show');
    Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
    Route::delete('/contacts/{id}/email', [ContactController::class, 'email'])->name('contacts.destroy');
    
    Route::get('/accounts', [BusinessController::class, 'create'])->name('accounts.create');
    Route::post('/accounts', [BusinessController::class, 'store'])->name('accounts.store');
    Route::get('/accounts', [BusinessController::class, 'all'])->name('accounts.create');

    // Opportunities routes
    Route::get('/opportunities', [OpportunityController::class, 'index'])->name('opportunities.index');
    Route::get('/funnel', [OpportunityController::class, 'menu']);
    Route::get('/opportunities/create', [OpportunityController::class, 'create'])->name('opportunities.create');
    Route::post('/opportunities.store', [OpportunityController::class, 'store'])->name('opportunities.store');
    Route::get('/opportunities/{opportunity}/edit', [OpportunityController::class, 'edit']);
    Route::put('/opportunities/{opportunity}', [OpportunityController::class, 'update']);
    Route::delete('/opportunities/{opportunity}', [OpportunityController::class, 'destroy']);
    // Define other routes for opportunities (create, store, show, edit, update, destroy) as needed
    
    // Interactions routes
    Route::get('/interactions', [InteractionController::class, 'index'])->name('interactions.index');
    // Define other routes for interactions (create, store, show, edit, update, destroy) as needed
    
    // Tasks routes
    Route::get('/tasks-manager', [TaskController::class, 'menu'])->name('tasks.menu');
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
    // Define other routes for tasks (create, store, show, edit, update, destroy) as needed
        
    // Notes routes
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    // Define other routes for notes (create, store, show, edit, update, destroy) as needed
    
    // Lead Handoff routes
    Route::post('/leads/{lead}/handoff', [LeadHandoffController::class, 'handoff']);
    
    Route::get('/leads-manager', [LeadController::class, 'showMenu']);
    Route::get('/leads', [LeadController::class, 'index']);
    Route::get('/leads/create', [LeadController::class, 'create']);
    Route::post('/leads/create', [LeadController::class, 'store']);
    Route::get('/leads/{lead}/edit', [LeadController::class, 'edit']);
    Route::put('/leads/{lead}', [LeadController::class, 'update']);
    Route::delete('/leads/{lead}', [LeadController::class, 'destroy']);
        
    //Lead routes
    Route::get('/leads/score', [LeadController::class, 'scoreLeads']);
    Route::get('/leads/qualify', [LeadController::class, 'qualifyLeads']);

    Route::get('/widgets/data', function () {
        return view('widgets.data');
    })->name('data');

    
    // Appointment routes
    Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    // Define other routes for appointments (create, store, show, edit, update, destroy) as needed
    
});