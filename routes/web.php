<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LetterTypeController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\dashboard;
use App\Models\LetterType;
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
    return view('admin.layout.admin');
});


Route::prefix('/surat')->name('surat.')->group(function () {
    Route::get('/', [LetterTypeController::class, 'index'])->name('index');
    Route::get('/create', [LetterTypeController::class, 'create'])->name('create');
    Route::post('/store', [LetterTypeController::class, 'store'])->name('store');
    Route::get('/{id}', [LetterTypeController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [LetterTypeController::class, 'update'])->name('update');
    Route::delete('/{id}', [LetterTypeController::class, 'destroy'])->name('destroy');
});

Route::prefix('/letter')->name('letter.')->group(function () {
    Route::get('/', [LetterController::class, 'index'])->name('index');
    Route::get('/create', [LetterController::class, 'create'])->name('create');
    Route::post('/store', [LetterController::class, 'store'])->name('store');
    Route::get('/{id}', [LetterController::class, 'edit'])->name('edit');
    Route::patch('/{id}', [LetterController::class, 'update'])->name('update');
    Route::delete('/{id}', [LetterController::class, 'destroy'])->name('destroy');
});

Route::prefix('/users')->name('users.')->group(function () {
    // route staff
    Route::get('/staff', [UserController::class, 'index'])->name('index');
    Route::get('/staff/create', [UserController::class, 'create'])->name('create');
    Route::post('/staff/store', [UserController::class, 'store'])->name('store');
    Route::get('/staff/{id}', [UserController::class, 'edit'])->name('edit');
    Route::patch('/staff/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/staff/{id}', [UserController::class, 'destroy'])->name('destroy');

    // route guru
    Route::get('/guru', [UserController::class, 'index2'])->name('index2');
    Route::get('/guru/create', [UserController::class, 'create2'])->name('create2');
    Route::post('/guru/store', [UserController::class, 'store2'])->name('store2');
    Route::get('/guru/{id}', [UserController::class, 'edit2'])->name('edit2');
    Route::patch('/guru/{id}', [UserController::class, 'update2'])->name('update2');
    Route::delete('/guru/{id}', [UserController::class, 'destroy2'])->name('destroy2');
});
Route::get('/', [dashboard::class, 'index'])->name('dashboard');

// Route::get('/register', [AuthController::class, 'index'])->name('registrasi');
