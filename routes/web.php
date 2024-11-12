<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
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