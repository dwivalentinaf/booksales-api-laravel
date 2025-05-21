<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenresController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/genres', [GenresController::class, 'index']);
Route::post('/genres', [GenresController::class, 'store']);


Route::get('/authors', [AuthorController::class, 'index']);
Route::post('/authors', [AuthorController::class, 'store']);


Route::get('/books', [BookController::class, 'index']);
Route::post('/books', [BookController::class, 'store']);