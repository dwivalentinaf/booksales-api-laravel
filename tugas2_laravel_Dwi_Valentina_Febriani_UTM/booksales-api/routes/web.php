<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenresController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/genres', [GenresController::class, 'index']);

Route::get('/authors', [AuthorController::class, 'index']);

Route::get('/books', [BookController::class, 'index']);
