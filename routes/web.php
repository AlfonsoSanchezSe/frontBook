<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("login");

});

Route::post('/login', [AuthController::class, 'login'])->name("login");
Route::get('/books', [BookController::class, 'books'])->name('books');
Route::get('/createBook', [BookController::class, 'createBook'])->name('createBook');
Route::post('/proccessCreate', [BookController::class, 'proccessCreateBook'])->name('proccessCreateBook');
Route::get('/confirmDelete&id={id}', [BookController::class, 'confirmDelete'])->name('confirmDelete');
Route::get('/deleteBook&id={id}', [BookController::class, 'deleteBook'])->name('deleteBook');
Route::get('/updateBook&id={id}', [BookController::class, 'updatePage'])->name('updateBook');
Route::post('/proccessUpdate&id={id}', [BookController::class, 'updateBook'])->name('proccessUpdate');