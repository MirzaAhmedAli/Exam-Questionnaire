<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\QuestionController;
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

Route::resource('/exam', App\Http\Controllers\QuestionController::class);
Route::get('/exam/{questionId}/delete', [App\Http\Controllers\QuestionController::class, 'destroy'])->name('question.delete');
