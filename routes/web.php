<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SleepLogController;
use App\Http\Controllers\WaterLogController;
use App\Http\Controllers\ActivityLogController;
USE App\Http\Controllers\DashboardController;

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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard',  [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //SleepLog
    Route::get('/sommeil',[SleepLogController::class, 'index'])->name('sleep.index');
    Route::post('/sommeil',[SleepLogController::class, 'store'])->name('sleep.store');
    Route::delete('/sommeil/{sleepLog}',[SleepLogController::class, 'destroy'])->name('sleep.destroy');

     //WaterLog
    Route::get('/hydratation',[WaterLogController::class, 'index'])->name('water.index');
    Route::post('/hydratation',[WaterLogController::class, 'store'])->name('water.store');
    Route::delete('/hydratation/{waterLog}',[WaterLogController::class, 'destroy'])->name('water.destroy');

     //WaterLog
    Route::get('/activite',[ActivityLogController::class, 'index'])->name('activity.index');
    Route::post('/activite',[ActivityLogController::class, 'store'])->name('activity.store');
    Route::delete('/activite/{activityLog}',[ActivityLogController::class, 'destroy'])->name('activity.destroy');
});

require __DIR__.'/auth.php';


