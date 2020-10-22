<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ExportController;
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

Route::get('/book/{id}/edit', [BookController::class, 'Edit'])->name('book-edit');
Route::get('/book/{id}', [BookController::class, 'Get'])->name('book-get');
Route::get('/book', [BookController::class, 'Create'])->name('book-create');
Route::get('/', [BookController::class, 'List'])->name('book-list');

Route::get('/export/excel/{id}', [ExportController::class, 'Excel'])->name('export-excel');