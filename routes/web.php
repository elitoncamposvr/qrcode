<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CodeClassController;
use App\Http\Controllers\CodeGroupController;
use App\Http\Controllers\CodeFamilyController;
// use App\Http\Controllers\CodeGroupController;

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/codes', [CodeController::class, 'index'])->name('codes.index');
Route::get('/codes/create', [CodeController::class, 'create'])->name('codes.create');
Route::post('/codes/store', [CodeController::class, 'store'])->name('codes.store');
Route::get('/codes/edit/{$id}', [CodeController::class, 'edit'])->name('codes.edit');
Route::put('/codes/update/{id}', [CodeController::class, 'update'])->name('codes.update');
Route::delete('/codes/destroy', [CodeController::class, 'destroy'])->name('codes.destroy');

Route::get('/registers', function () {
    return view('registers');
})->name('registers');

Route::get('/codeclass', [CodeClassController::class, 'index'])->name('codeclass.index');
Route::get('/codeclass/create', [CodeClassController::class, 'create'])->name('codeclass.create');
Route::post('/codeclass/store', [CodeClassController::class, 'store'])->name('codeclass.store');
Route::get('/codeclass/edit/{id}', [CodeClassController::class, 'edit'])->name('codeclass.edit');
Route::put('/codeclass/update/{id}', [CodeClassController::class, 'update'])->name('codeclass.update');
Route::delete('/codeclass/destroy', [CodeClassController::class, 'destroy'])->name('codeclass.destroy');

Route::get('/codefamily', [CodeFamilyController::class, 'index'])->name('codefamily.index');
Route::get('/codefamily/create', [CodeFamilyController::class, 'create'])->name('codefamily.create');
Route::post('/codefamily/store', [CodeFamilyController::class, 'store'])->name('codefamily.store');
Route::get('/codefamily/edit/{id}', [CodeFamilyController::class, 'edit'])->name('codefamily.edit');
Route::put('/codefamily/updatedit/{id}', [CodeFamilyController::class, 'update'])->name('codefamily.update');
Route::delete('/codefamily/destroy', [CodeFamilyController::class, 'destroy'])->name('codefamily.destroy');

Route::get('/codegroup', [CodeGroupController::class, 'index'])->name('codegroup.index');
Route::get('/codegroup/create', [CodeGroupController::class, 'create'])->name('codegroup.create');
Route::post('/codegroup/store', [CodeGroupController::class, 'store'])->name('codegroup.store');
Route::get('/codegroup/edit/{id}', [CodeGroupController::class, 'edit'])->name('codegroup.edit');
Route::put('/codegroup/update/{id}', [CodeGroupController::class, 'update'])->name('codegroup.update');
Route::delete('/codegroup/destroy', [CodeGroupController::class, 'destroy'])->name('codegroup.destroy');

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/destroy', [UserController::class, 'destroy'])->name('users.destroy');

require __DIR__ . '/auth.php';
