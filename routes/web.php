<?php

use App\Http\Controllers\Frontend\InstructorController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});


Route::group(['middleware' => ['auth:web', 'verified', 'check_role:student'], 'prefix' => 'student', 'as' => 'student.'], function () {
  Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['auth:web', 'verified', 'check_role:instructor'], 'prefix' => 'instructor', 'as' => 'instructor.'], function () {
  Route::get('/dashboard', [InstructorController::class, 'index'])->name('dashboard');
});

Route::get('/admin/dashboard', function () {
  return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

require __DIR__ . '/auth.php';

require __DIR__ . '/admin.php';
