<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ServiceController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

// TODO: Add logout button in the dashboard page to logout from admin backend
/* Backend routes */
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/services', ServiceController::class);
});


/* Frontend routes */
Route::get('/', [AppointmentController::class, 'showBookingForm'])->name('index');
Route::post('/appointments/book', [AppointmentController::class, 'bookAppointment'])->name('appointments.bookAppointment');
