<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;


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
    Route::get('/create', [UserController::class, 'UserCreate'])->name('user.create');
    Route::post('/save', [UserController::class, 'UserSave'])->name('users.save');
    Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
    Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
});

// User Profile and Change Password
Route::prefix('profile')->group(function () {
    Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
    Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');
    Route::post('/save', [ProfileController::class, 'ProfileSave'])->name('profile.save');
    Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
    Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
    
});

// Setup Management
Route::prefix('setups')->group(function () {

    //Student Class Routes
    Route::get('student/class/view', [StudentClassController::class, 'ViewStudent'])->name('student.class.view');
 
    Route::get('student/class/create', [StudentClassController::class, 'CreateStudentClass'])->name('student.class.create');
    
    Route::post('student/class/save', [StudentClassController::class, 'SaveStudentClass'])->name('save.student.class');

    Route::get('student/class/edit/{id}', [StudentClassController::class, 'EditStudentClass'])->name('edit.student.class');

    Route::post('student/class/update/{id}', [StudentClassController::class, 'UpdateStudentClass'])->name('update.student.class');

    Route::get('student/class/delete/{id}', [StudentClassController::class, 'DeleteStudentClass'])->name('delete.student.class');

    //Student Year Routes
    Route::get('student/year/view', [StudentYearController::class, 'ViewYear'])->name('student.year.view');
 
    Route::get('student/year/create', [StudentYearController::class, 'CreateStudentYear'])->name('student.year.create');
    
    Route::post('student/year/save', [StudentYearController::class, 'SaveStudentYear'])->name('save.student.year');

    Route::get('student/year/edit/{id}', [StudentYearController::class, 'EditStudentYear'])->name('edit.student.year');

    Route::post('student/year/update/{id}', [StudentYearController::class, 'UpdateStudentYear'])->name('update.student.year');

    Route::get('student/year/delete/{id}', [StudentYearController::class, 'DeleteStudentYear'])->name('delete.student.year');

});
