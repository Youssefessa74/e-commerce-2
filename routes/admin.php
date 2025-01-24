<?php

use App\Http\Controllers\Admin\AdminsController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SubCategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
// Admin List Routes
Route::get('admin-list/delete/{id}',[AdminsController::class,'delete'])->name('admin-list.delete');
Route::resource('admin-list',AdminsController::class);

// Category Routes
Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');
Route::resource('category',CategoryController::class);

// sub Category Routes
Route::get('sub-category/delete/{id}',[SubCategoryController::class,'delete'])->name('sub-category.delete');
Route::resource('sub-category',SubCategoryController::class);
