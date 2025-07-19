<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DekidakaHeaderController;
use App\Http\Controllers\DekidakaMainController;
use App\Http\Controllers\KpiController;
use App\Http\Controllers\LossTimeDetailController;
use App\Http\Controllers\ProductionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard.index');

Route::get('/production', [ProductionController::class, 'index'])->middleware(['auth'])->name('production.index');

Route::post('/dekidaka-header', [DekidakaHeaderController::class, 'storeOrUpdate'])->name('dekidaka-header.storeOrUpdate');
Route::delete('/dekidaka-header/{id}', [DekidakaHeaderController::class, 'destroy'])->name('dekidaka-header.destroy');

Route::post('/dekidaka-main', [DekidakaMainController::class, 'store'])->name('dekidaka-main.store');
Route::patch('/dekidaka-main', [DekidakaMainController::class, 'update'])->name('dekidaka-main.update');
Route::delete('/dekidaka-main/{id}', [DekidakaMainController::class, 'destroy'])->name('dekidaka-main.destroy');

Route::get('/kpi', [KpiController::class, 'index'])->name('kpi.index');

//API for AJAX
Route::post('/loss-time-details', [LossTimeDetailController::class, 'storeOrUpdateLossTimeDetail'])->name('loss-time-detail.store');
Route::get('/loss-time-details', [LossTimeDetailController::class, 'show'])->name('loss-time-detail.show');
Route::delete('/loss-time-details/{id}', [LossTimeDetailController::class, 'destroy'])->name('loss-time-detail.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
