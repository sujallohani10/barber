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

/* Backend routes */
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// TODO add prefix admin to all admin routes
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/services', [ServiceController::class, 'index'])->name('admin.services');


/* Frontend routes */
Route::get('/', [AppointmentController::class, 'showBookingForm'])->name('index');
Route::post('/appointments/book', [AppointmentController::class, 'bookAppointment'])->name('appointments.bookAppointment');
