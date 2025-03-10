<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\NewsarticleController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');

// Profil
Route::view('/profil/sejarah', 'public.profil.sejarah')->name('profil.sejarah');
Route::view('/profil/visi-misi', 'public.profil.visi-misi')->name('profil.visi-misi');
Route::view('/profil/sambutan-pimpinan', 'public.profil.sambutan-pimpinan')->name('profil.sambutan-pimpinan');

// Informasi
Route::get('/informasi/berita-artikel', [PublicController::class, 'beritaartikel'])->name('informasi.berita-artikel');
Route::get('/informasi/prestasi', [PublicController::class, 'prestasi'])->name('informasi.prestasi');
Route::get('/fasilitas', [PublicController::class, 'fasilitas'])->name('fasilitas');
Route::get('/ekstrakulikuler', [PublicController::class, 'ekstrakulikuler'])->name('ekstrakulikuler');
Route::view('/kontak', 'public.kontak')->name('kontak');

Route::middleware('guest')->group(function () {
    Route::view('/login', 'dashboard.login')->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::resource('newsarticles', NewsarticleController::class);
Route::resource('achievements', AchievementController::class);
Route::resource('facilities', FacilityController::class);
Route::resource('extracurriculars', ExtracurricularController::class);

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard.index')->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
