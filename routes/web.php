<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;




Route::get('/', [ReservationController::class, 'home'])->name('home');

Route::get('/reservation', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');



Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'doLogin'])->name('admin.login.post');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('/admin/dashboard', [ReservationController::class, 'index'])->name('admin.dashboard');
Route::delete('/admin/reservations/{id}', [ReservationController::class, 'destroy'])->name('admin.reservation.destroy');


Route::get('/reservations/export', [ReservationController::class, 'export'])->name('reservation.export');
