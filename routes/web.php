<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('welcome');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('about', 'about')->name('about');

    // Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/', function () {
    return redirect('appointments');
});

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['auth', 'verified']);

Route::get('/email', [MailController::class, 'send'])->middleware(['auth', 'verified']);

Route::get('/send-notification', [NotificationController::class, 'send'])->middleware('auth');


Route::get('/addAppointment', [AppointmentController::class, 'create'])->middleware(['auth', 'verified'])->name('appointements.step1');;

Route::post('/addAppointment/step1', [AppointmentController::class, 'step1'])->middleware(['auth', 'verified'])->name('appointements.step1');

Route::post('/addAppointment/store', [AppointmentController::class, 'store'])->middleware(['auth', 'verified'])->name('appointements.store');


Route::resource('/appointments', AppointmentController::class)->middleware(['auth', 'verified']);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::resource('/cpanel', UserController::class)->middleware(['auth', 'verified']);
