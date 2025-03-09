<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['show']),
        ];
    }

    public function index()
    {
        $facilities = Facility::latest()->paginate(8);
        return view('dashboard.facility.index', compact('facilities'));
    }

    public function create()
    {
        return view('dashboard.facility.create');
    }

    public function store(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'caption' => 'required|max:255|unique:facilities',
            'image' => 'file|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $slug = Str::slug($fields['caption']);

        // Upload image if file exist
        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('facilities-images', $request->image);
        }

        Auth::user()->facilities()->create([...$fields, 'slug' => $slug, 'image' => $path]);

        return redirect('/facilities')->with('success', 'Fasilitas berhasil dibuat');
    }

    public function show(Facility $facility)
    {
        $latestNews = Facility::latest()->where('id', '!=', $facility->id)->take(8)->get();
        return view('public.informasi.berita-artikel-show', compact('facility', 'latestNews'));
    }

    public function edit(Facility $facility)
    {
        return view('dashboard.facility.edit', compact('facility'));
    }

    public function update(Request $request, Facility $facility)
    {
        // Validate
        $fields = $request->validate([
            'caption' => "required|max:255|unique:facilities,caption,$facility->id",
            'image' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'delete_image' => 'nullable|boolean'
        ]);

        $slug = Str::slug($fields['caption']);

        // Handle image deletion
        if ($request->has('delete_image') && $request->delete_image) {
            if ($facility->image) {
                Storage::disk('public')->delete($facility->image);
            }
            $fields['image'] = null;
        }

        // Upload new image if provided
        if ($request->hasFile('image')) {
            if ($facility->image) {
                Storage::disk('public')->delete($facility->image);
            }
            $fields['image'] = Storage::disk('public')->put('facilities-images', $request->image);
        }

        // Update the news
        $facility->update([...$fields, 'slug' => $slug]);

        return redirect('/facilities')->with('success', "$facility->title berhasil di-update");
    }

    public function destroy(Facility $facility)
    {
        if ($facility->image) {
            Storage::disk('public')->delete($facility->image);
        }

        $facility->delete();

        return back()->with('success', "$facility->title berhasil dihapus");
    }
}
