<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\ProfileController;
use App\Models\Colocation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return redirect()->route('colocation.index');
});

Route::middleware('auth')->group(function () {
    Route::delete('/colocation/leave',              [ColocationController::class, 'leave'])->name('colocation.leave');
    Route::delete('/colocation/cancel',             [ColocationController::class, 'cancel'])->name('colocation.cancel');
    Route::delete('/colocation/members/{member}',   [ColocationController::class, 'kickMember'])->name('colocation.kickMember');
    Route::resource('expenses', ExpenseController::class)->except(['edit', 'update']);
    Route::post('/expenses/{expense}/settled', [ExpenseController::class, 'settled'])->name('expenses.settled');
    Route::resource('colocation', ColocationController::class);
    Route::resource('invitations', InvitationController::class);
    Route::resource('categories', CategoryController::class)->except(['show']);
    Route::post('/invitations/{invitation}/accept', [InvitationController::class, 'accept'])->name('invitations.accept');
    Route::post('/invitations/{invitation}/reject', [InvitationController::class, 'reject'])->name('invitations.reject');
    Route::resource('debts', CalculationController::class)->only(['index']);
});



Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::patch('/users/{user}/ban',   [AdminController::class, 'ban'])->name('ban');
    Route::patch('/users/{user}/unban', [AdminController::class, 'unban'])->name('unban');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
