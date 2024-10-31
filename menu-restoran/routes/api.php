<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/menu', [BukuController::class, 'index']);
Route::post('/menu', [BukuController::class, 'store']);
