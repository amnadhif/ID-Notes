<?php

use App\Http\Controllers\NotesController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// User
Route::get('login', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'authenticate']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('register', [AuthController::class, 'register_form'])->name('register');
Route::post('register', [AuthController::class, 'register']);

// Notes
Route::get('/', [NotesController::class, 'show']);
Route::get('/note', [NotesController::class, 'index']);
Route::get('/note/create', [NotesController::class, 'create']);
Route::post('/note', [NotesController::class, 'store']);
Route::get('/note/{id}/edit', [NotesController::class, 'edit']);
Route::patch('/note/{id}', [NotesController::class, 'update']);
Route::delete('/note/{id}', [NotesController::class, 'destroy']);