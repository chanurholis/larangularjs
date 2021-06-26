<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/contact/{id}', [ContactController::class, 'show']);
Route::put('/contact/{id}', [ContactController::class, 'update']);
Route::delete('/contact/{id}', [ContactController::class, 'destroy']);
