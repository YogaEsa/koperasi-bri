<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
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
