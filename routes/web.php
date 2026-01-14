<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/login');
});

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (Memerlukan autentikasi)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Member Management Routes (Static)
    Route::get('/members', function () {
        return view('members.index');
    })->name('members.index');

    Route::get('/members/create', function () {
        return view('members.create');
    })->name('members.create');

    Route::get('/members/{id}/edit', function ($id) {
        return view('members.edit', ['id' => $id]);
    })->name('members.edit');

    // Cash Management Routes (Static)
    Route::get('/manajemen-kas', function () {
        return view('cash.index');
    })->name('cash.index');

    Route::get('/manajemen-kas/create', function () {
        return view('cash.create');
    })->name('cash.create');

    Route::get('/manajemen-kas/{id}/edit', function ($id) {
        return view('cash.edit', ['id' => $id]);
    })->name('cash.edit');

    // Savings Routes (Static)
    Route::get('/savings', function () {
        return view('savings.index');
    })->name('savings.index');

    Route::get('/savings/create', function () {
        return view('savings.create');
    })->name('savings.create');

    Route::get('/savings/{id}/edit', function ($id) {
        return view('savings.edit', ['id' => $id]);
    })->name('savings.edit');

    // Loans Routes (Static)
    Route::get('/loans', function () {
        return view('loans.index');
    })->name('loans.index');

    Route::get('/loans/create', function () {
        return view('loans.create');
    })->name('loans.create');

    Route::get('/loans/{id}/edit', function ($id) {
        return view('loans.edit', ['id' => $id]);
    })->name('loans.edit');

    // Reports Route (Static)
    Route::get('/reports', function () {
        return view('reports.index');
    })->name('reports.index');

    // Settings Route (Static)
    Route::get('/settings', function () {
        return view('settings.index');
    })->name('settings.index');
});
