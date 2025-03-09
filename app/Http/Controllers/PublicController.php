<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\Facility;
use App\Models\Newsarticle;

class PublicController extends Controller
{
    public function index()
    {
        $newsarticles = Newsarticle::latest()->take(4)->get();
        $achievements = Achievement::latest()->take(4)->get();
        $facilities = Facility::latest()->take(4)->get();
        return view('welcome', compact('newsarticles', 'achievements', 'facilities'));
    }

    public function beritaartikel()
    {
        $newsarticles = Newsarticle::latest()->paginate(8);
        return view('public.informasi.berita-artikel', compact('newsarticles'));
    }

    public function prestasi()
    {
        $achievements = Achievement::latest()->paginate(8);
        return view('public.informasi.prestasi', compact('achievements'));
    }

    public function fasilitas()
    {
        $facilities = Facility::latest()->paginate(8);
        return view('public.fasilitas', compact('facilities'));
    }
}
