<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/posts',[PostController::class, 'index'])->name('index');
Route::get('/posts/create',[PostController::class, 'create'])->name('create');
Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('edit');
Route::post('/post',[PostController::class, 'store'])->name('store');
Route::put('/posts/{post}',[PostController::class, 'update'])->name('update');
Route::get('/posts/{post}',[PostController::class, 'show'])->name('show');
Route::delete('posts/{post}',[PostController::class, 'destroy'])->name('delete');