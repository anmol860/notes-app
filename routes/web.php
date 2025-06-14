<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', [NoteController::class, 'index']);
Route::post('/add', [NoteController::class, 'store']);
Route::delete('/delete/{note}', [NoteController::class, 'destroy']);