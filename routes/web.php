<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view("login");

});

Route::post('/login', [AuthController::class, 'login'])->name("login");
Route::get('/books', [BookController::class, 'books'])->name('books');