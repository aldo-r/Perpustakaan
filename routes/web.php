<?php

use App\Http\Controllers\authorController;
use App\Http\Controllers\booksController;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\publisherController;
use App\Models\authors;
use App\Models\books;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [dashboardcontroller::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// route authors
Route::get('authors', [authorController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('authors');
Route::get('authors/create', [authorController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('author.create');
Route::post('authors', [authorController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('author.store');
Route::get('authors/{id}/edit', [authorController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('author.edit');
Route::put('authors/{id}', [authorController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('authors.update');
Route::delete('/authors/{id}', [authorController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('authors.destroy');


// route publisher
Route::get('publisher', [publisherController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('publisher');
Route::get('publisher/create', [publisherController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('publisher.create');
Route::post('/publisher', [publisherController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('publisher.store');
Route::get('/publisher/{id}/edit', [publisherController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('publisher.edit');
Route::put('/publisher/{id}', [publisherController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('publisher.update');
Route::delete('/publisher/{id}', [publisherController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('publisher.detroy');
// route books
Route::get('books', [booksController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('books');
Route::get('books/create', [booksController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('books.create');
Route::post('/books', [booksController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('books.store');
Route::get('books/{id}/edit', [booksController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('books.edit');
Route::put('books/{id}', [booksController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('books.update');
Route::delete('books/{id}', [booksController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('books.destroy');
Route::get('books/{id}/show', [booksController::class, 'show'])->name('books.show');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
