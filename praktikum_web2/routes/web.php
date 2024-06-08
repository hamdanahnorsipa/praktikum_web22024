<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

//halaman depan
Route::get('/', function () { 
    return view('welcome'); 
})->name('loginView'); 

Route::get('/home', function () { 
    return view('home'); 
    })->name('home');

Route::get('/mahasiswa', function () { 
    return view('mahasiswa'); 
});

//routing autentikasi
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout/user', [AuthController::class, 'logout'])->name('logout');

//routing data mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa/create', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/edit/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');