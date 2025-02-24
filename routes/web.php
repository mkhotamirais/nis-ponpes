<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');

// Profile
Route::view('/profil/sejarah', 'public.profile.sejarah')->name('profil.sejarah');
Route::view('/profil/visi-misi', 'public.profile.visi-misi')->name('profil.visi-misi');
Route::view('/profil/sambutan-pengasuh', 'public.profile.sambutan-pengasuh')->name('profil.sambutan-pengasuh');

// Informasi
Route::view('/fasilitas', 'public.fasilitas')->name('fasilitas');
Route::view('/kontak', 'public.kontak')->name('kontak');
Route::view('/ekstrakulikuler', 'public.ekstrakulikuler')->name('ekstrakulikuler');
