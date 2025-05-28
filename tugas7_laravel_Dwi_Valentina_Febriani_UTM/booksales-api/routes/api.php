<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenresController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::middleware(['auth:api'])->group(function () {

    Route::apiResource('/transactions', TransactionController::class)->only(['index', 'store', 'show']); 

    Route::middleware(['role:admin'])->group(function () {
    Route::apiResource('/books', BookController::class)->only(['store', 'update', 'destroy']); 
    Route::apiResource('/genres', GenresController::class)->only(['store', 'update', 'destroy']); 
    Route::apiResource('/authors', AuthorController::class)->only(['store', 'update', 'destroy']); 
    Route::apiResource('/transactions', TransactionController::class)->only(['update','destroy']);
    });

});



//Route::get('/genres', [GenresController::class, 'index']);
//Route::post('/genres', [GenresController::class, 'store']);
//Route::get('/genres/{id}', [GenresController::class, 'show']);
//Route::post('/genres/{id}', [GenresController::class, 'update']);
//oute::delete('/genres/{id}', [GenresController::class, 'destroy']);

// disederhanakan menjadi
Route::apiResource('/genres', GenresController::class)->only(['index','show']); //api resource



//Route::get('/authors', [AuthorController::class, 'index']);
//Route::post('/authors', [AuthorController::class, 'store']);
//Route::get('/authors/{id}', [AuthorController::class, 'show']);
//Route::post('/authors/{id}', [AuthorController::class, 'update']);
//Route::delete('/authors/{id}', [AuthorController::class, 'destroy']);

// disederhanakan menjadi
Route::apiResource('/authors', AuthorController::class)->only(['index','show']); //api resource




//Route::get('/books', [BookController::class, 'index']);
//Route::post('/books', [BookController::class, 'store']);
//Route::get('/books/{id}', [BookController::class, 'show']);
//Route::post('/books/{id}', [BookController::class, 'update']);
//Route::delete('/books/{id}', [BookController::class, 'destroy']);

// disederhanakan menjadi 
Route::apiResource('/books', BookController::class)->only(['index','show']); //api resource





