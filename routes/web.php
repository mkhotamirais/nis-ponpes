<?php

use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');

// Profil
Route::view('/profil/sejarah', 'public.profil.sejarah')->name('profil.sejarah');
Route::view('/profil/visi-misi', 'public.profil.visi-misi')->name('profil.visi-misi');
Route::view('/profil/sambutan-pimpinan', 'public.profil.sambutan-pimpinan')->name('profil.sambutan-pimpinan');

// Informasi
Route::view('/fasilitas', 'public.fasilitas')->name('fasilitas');
Route::view('/kontak', 'public.kontak')->name('kontak');
Route::view('/ekstrakulikuler', 'public.ekstrakulikuler')->name('ekstrakulikuler');
Route::view('/ekstrakulikuler/{name}', 'public.ekstrakulikuler-detail')->name('ekstrakulikuler-detail');
