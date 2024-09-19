<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\StudentFeeCategoryController;


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

    //Student Group Routes
    Route::get('student/group/view', [StudentGroupController::class, 'ViewGroup'])->name('student.group.view');
 
    Route::get('student/group/create', [StudentGroupController::class, 'CreateStudentGroup'])->name('student.group.create');
    
    Route::post('student/group/save', [StudentGroupController::class, 'SaveStudentGroup'])->name('save.student.group');

    Route::get('student/group/edit/{id}', [StudentGroupController::class, 'EditStudentGroup'])->name('edit.student.group');

    Route::post('student/group/update/{id}', [StudentGroupController::class, 'UpdateStudentGroup'])->name('update.student.group');

    Route::get('student/group/delete/{id}', [StudentGroupController::class, 'DeleteStudentGroup'])->name('delete.student.group');


    //Student Shift Routes
    Route::get('student/shift/view', [StudentShiftController::class, 'ViewShift'])->name('student.shift.view');
 
    Route::get('student/shift/create', [StudentShiftController::class, 'CreateStudentShift'])->name('student.shift.create');
    
    Route::post('student/shift/save', [StudentShiftController::class, 'SaveStudentShift'])->name('save.student.shift');

    Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'EditStudentShift'])->name('edit.student.shift');

    Route::post('student/shift/update/{id}', [StudentShiftController::class, 'UpdateStudentShift'])->name('update.student.shift');

    Route::get('student/shift/delete/{id}', [StudentShiftController::class, 'DeleteStudentShift'])->name('delete.student.shift');


    //Student Fee Category Routes
    Route::get('student/fee_cat/view', [StudentFeeCategoryController::class, 'ViewFeeCategory'])->name('student.fee_cat.view');
 
    Route::get('student/fee_cat/create', [StudentFeeCategoryController::class, 'CreateStudentFeeCategory'])->name('student.fee_cat.create');
    
    Route::post('student/fee_cat/save', [StudentFeeCategoryController::class, 'SaveStudentFeeCategory'])->name('save.student.fee_cat');

    Route::get('student/fee_cat/edit/{id}', [StudentFeeCategoryController::class, 'EditStudentFeeCategory'])->name('edit.student.fee_cat');

    Route::post('student/fee_cat/update/{id}', [StudentFeeCategoryController::class, 'UpdateStudentFeeCategory'])->name('update.student.fee_cat');

    Route::get('student/fee_cat/delete/{id}', [StudentFeeCategoryController::class, 'DeleteStudentFeeCategory'])->name('delete.student.fee_cat');


});
