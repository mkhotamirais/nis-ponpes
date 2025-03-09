<?php

namespace App\Http\Controllers;

use App\Models\Newsarticle;
use Illuminate\Support\Str;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsarticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['show']),
        ];
    }

    public function index()
    {
        $newsarticles = Newsarticle::latest()->paginate(8);
        return view('dashboard.newsarticle.index', compact('newsarticles'));
    }

    public function create()
    {
        return view('dashboard.newsarticle.create');
    }

    public function store(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'title' => 'required|max:255|unique:newsarticles',
            'content' => 'required',
            'banner' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $slug = Str::slug($fields['title']);

        // Upload image if file exist
        $path = null;
        if ($request->hasFile('banner')) {
            $path = Storage::disk('public')->put('newsarticles-images', $request->banner);
        }

        Auth::user()->newsarticles()->create([...$fields, 'slug' => $slug, 'banner' => $path]);

        return redirect('/newsarticles')->with('success', 'Berita berhasil dibuat');
    }

    public function show(Newsarticle $newsarticle)
    {
        $latestNews = Newsarticle::latest()->where('id', '!=', $newsarticle->id)->take(8)->get();

        return view('public.informasi.berita-artikel-show', compact('newsarticle', 'latestNews'));
    }

    public function edit(Newsarticle $newsarticle)
    {
        return view('dashboard.newsarticle.edit', compact('newsarticle'));
    }

    public function update(Request $request, Newsarticle $newsarticle)
    {
        // Validate
        $fields = $request->validate([
            'title' => "required|max:255|unique:newsarticles,title,$newsarticle->id",
            'content' => 'required',
            'banner' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'delete_banner' => 'nullable|boolean'
        ]);

        $slug = Str::slug($fields['title']);

        // Handle image deletion
        if ($request->has('delete_banner') && $request->delete_banner) {
            if ($newsarticle->banner) {
                Storage::disk('public')->delete($newsarticle->banner);
            }
            $fields['banner'] = null;
        }

        // Upload new image if provided
        if ($request->hasFile('banner')) {
            if ($newsarticle->banner) {
                Storage::disk('public')->delete($newsarticle->banner);
            }
            $fields['banner'] = Storage::disk('public')->put('newsarticles-images', $request->banner);
        }


        // Update the news
        $newsarticle->update([...$fields, 'slug' => $slug]);

        return redirect('/newsarticles')->with('success', "$newsarticle->title berhasil di-update");
    }

    public function destroy(Newsarticle $newsarticle)
    {
        if ($newsarticle->banner) {
            Storage::disk('public')->delete($newsarticle->banner);
        }

        $newsarticle->delete();

        return back()->with('success', "$newsarticle->title berhasil dihapus");
    }
}
