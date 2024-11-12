<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', [CategoryController::class, 'index']); 
Route::get('categories/create', [CategoryController::class, 'create'])->name('category.create'); 
Route::post('categories', [CategoryController::class, 'store'])->name('category.store');
Route::get('categories/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit'); 
Route::put('categories/{category}', [CategoryController::class, 'update'])->name('category.update'); 
Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy'); 

Route::get('loginPage' , [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/registerPage', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/users', [UserController::class, 'users'])->name('user.index');
Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
Route::post('/users', [UserController::class, 'store'])->name('user.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
