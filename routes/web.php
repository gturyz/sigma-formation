<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TrainingController::class, 'index'])->name('trainingList');
Route::get('/training/{id}', [TrainingController::class, 'show'])->name('trainingDetails');

Route::post('/contact', [ContactController::class, 'send'])->name('sendMail');

Route::put('users/{id}/accept', [UserController::class, 'accept'])->name('userAccept');
Route::delete('users/{id}', [UserController::class, 'destroy'])->name('userDelete');

Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
