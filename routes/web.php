<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/persons/create', [PersonController::class, 'create'])->name('persons.create');
Route::post('/persons', [PersonController::class, 'store'])->name('persons.store');
// برای دریافت آخرین کد حسابداری (AJAX)
Route::get('/persons/latest-code', [PersonController::class, 'latestCode'])->name('persons.latestCode');

// برای افزودن دسته‌بندی جدید (AJAX)
Route::post('/persons/add-category', [PersonController::class, 'addCategory'])->name('persons.addCategory');
require __DIR__.'/auth.php';
