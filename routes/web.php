<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();
//principal del sitio

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::POST('/files', [App\Http\Controllers\ImageController::class, 'store'])->name('files.store');
Route::get('/files/img', [App\Http\Controllers\ImageController::class, 'index'])->name('files.index');
Route::get('/files/{id}', [App\Http\Controllers\ImageController::class, 'show'])->name('files.show');
Route::get('/files/{id}/edit', [App\Http\Controllers\ImageController::class, 'edit'])->name('files.edit');
Route::put('/files/{id}', [App\Http\Controllers\ImageController::class, 'update'])->name('files.update');

