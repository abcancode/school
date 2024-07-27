<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});
Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

// User Management Routes

Route::prefix('users')->group(function () {
    Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
    Route::get('/user/create', [UserController::class, 'UserCreate'])->name('user.create');
});
