<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\AuthController;

// Route for the homepage
Route::get('/', [HomeController::class, 'index']);

// Route to display all authors
Route::get('/authors', [AuthorController::class, 'list']);

// Route to show the data input form (GET request)
Route::get('/authors/create', [AuthorController::class, 'create']);

// Route to handle form submission and process the data (POST request)
Route::post('/authors/put', [AuthorController::class, 'put']);

// Route to show the form for editing an author (GET request)
Route::get('/authors/update/{author}', [AuthorController::class, 'update']);

// Route to handle form submission and update an author (POST request)
Route::post('/authors/patch/{author}', [AuthorController::class, 'patch']);

// Route to handle author deletion (POST request)
Route::post('/authors/delete/{author}', [AuthorController::class, 'delete']);

// Auth routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);
