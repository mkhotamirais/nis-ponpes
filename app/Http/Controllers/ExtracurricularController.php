<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Extracurricular;
use App\Models\Extracurricularimage;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ExtracurricularController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['show']),
        ];
    }
    public function index()
    {
        $extracurriculars = Extracurricular::latest()->get();
        return view('dashboard.extracurricular.index', compact('extracurriculars'));
    }
    public function create()
    {
        return view('dashboard.extracurricular.create');
    }
    public function store(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'name' => 'required|max:255|unique:extracurriculars',
            'detail' => 'nullable',
            'banner' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $slug = Str::slug($fields['name']);

        // Upload image if file exist
        $path = null;
        if ($request->hasFile('banner')) {
            $path = Storage::disk('public')->put('extracurriculars-images', $request->banner);
        }

        $extracurricular = Auth::user()->extracurriculars()->create([...$fields, 'slug' => $slug, 'banner' => $path]);

        // Simpan gambar-gambar ke storage dan database
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('extracurriculars-images', 'public');
                $extracurricular->extracurricularimages()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect('/extracurriculars')->with('success', 'Extracurricular created successfully');
    }
    public function show(Extracurricular $extracurricular)
    {
        $latestExtracurriculars = Extracurricular::latest()->where('id', '!=', $extracurricular->id)->take(4)->get();
        return view('public.ekstrakulikuler-show', compact('extracurricular', 'latestExtracurriculars'));
    }

    public function edit(Request $request, Extracurricular $extracurricular)
    {
        return view('dashboard.extracurricular.edit', compact('extracurricular'));
    }
    public function update(Request $request, Extracurricular $extracurricular)
    {
        // Validate
        $fields = $request->validate([
            'name' => "required|max:255|unique:extracurriculars,name,$extracurricular->id",
            'detail' => 'nullable',
            'banner' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'delete_images' => 'nullable|array',
            'delete_images.*' => 'exists:extracurricularimages,id',
        ]);

        $slug = Str::slug($fields['name']);

        // Upload image if file exist
        $path = null;
        if ($request->hasFile('banner')) {
            $path = Storage::disk('public')->put('extracurriculars-images', $request->banner);
        }

        $path = $extracurricular->banner ?? null;
        if ($request->hasFile('banner')) {
            if ($extracurricular->banner) {
                Storage::disk('public')->delete($extracurricular->banner);
            }
            $path = Storage::disk('public')->put('extracurriculars-images', $request->banner);
        }
        // Update the extracurricular
        $extracurricular->update([...$fields, 'slug' => $slug, 'banner' => $path]);

        // Hapus gambar yang dipilih
        if ($request->has('delete_images')) {
            $imagesToDelete = Extracurricularimage::whereIn('id', $request->delete_images)->get();
            foreach ($imagesToDelete as $image) {
                // Hapus file fisik
                if (Storage::disk('public')->exists($image->image_path)) {
                    Storage::disk('public')->delete($image->image_path);
                }
                // Hapus data dari database
                $image->delete();
            }
        }

        // Tambahkan gambar baru
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('extracurriculars-images', 'public');
                $extracurricular->extracurricularimages()->create([
                    'image_path' => $path,
                ]);
            }
        }

        return redirect('/extracurriculars')->with('success', 'Extracurricular updaed successfully');
    }

    public function destroy(Extracurricular $extracurricular)
    {
        foreach ($extracurricular->extracurricularimages as $image) {
            $filePath = $image->image_path;
            if (Storage::disk('public')->exists($filePath)) {
                // dump('File exists: ' . $filePath);
                Storage::disk('public')->delete($filePath);
                // dump('File deleted: ' . $filePath);
            } else {
                // dump('File not found: ' . $filePath);
            }
            $image->delete(); // Hapus data dari database
        }

        if ($extracurricular->banner) {
            Storage::disk('public')->delete($extracurricular->banner);
        }

        $extracurricular->delete();

        return back()->with('delete', 'Extracurricular deleted successfully');
    }
}
