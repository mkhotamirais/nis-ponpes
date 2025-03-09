<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAchievementRequest;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\UpdateAchievementRequest;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AchievementController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', except: ['show']),
        ];
    }

    public function index()
    {
        $achievements = Achievement::latest()->paginate(8);
        return view('dashboard.achievement.index', compact('achievements'));
    }

    public function create()
    {
        return view('dashboard.achievement.create');
    }

    public function store(Request $request)
    {
        // Validate
        $fields = $request->validate([
            'title' => 'required|max:255|unique:achievements',
            'content' => 'required',
            'banner' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $slug = Str::slug($fields['title']);

        // Upload image if file exist
        $path = null;
        if ($request->hasFile('banner')) {
            $path = Storage::disk('public')->put('achievements-images', $request->banner);
        }

        Auth::user()->achievements()->create([...$fields, 'slug' => $slug, 'banner' => $path]);

        return redirect('/achievements')->with('success', 'Berita berhasil dibuat');
    }

    public function show(Achievement $achievement)
    {
        $latestAchievements = Achievement::latest()->where('id', '!=', $achievement->id)->take(8)->get();

        return view('public.informasi.prestasi-show', compact('achievement', 'latestAchievements'));
    }

    public function edit(Achievement $achievement)
    {
        return view('dashboard.achievement.edit', compact('achievement'));
    }

    public function update(Request $request, Achievement $achievement)
    {
        // Validate
        $fields = $request->validate([
            'title' => "required|max:255|unique:achievements,title,$achievement->id",
            'content' => 'required',
            'banner' => 'nullable|file|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'delete_banner' => 'nullable|boolean'
        ]);

        $slug = Str::slug($fields['title']);

        // Handle image deletion
        if ($request->has('delete_banner') && $request->delete_banner) {
            if ($achievement->banner) {
                Storage::disk('public')->delete($achievement->banner);
            }
            $fields['banner'] = null;
        }

        // Upload new image if provided
        if ($request->hasFile('banner')) {
            if ($achievement->banner) {
                Storage::disk('public')->delete($achievement->banner);
            }
            $fields['banner'] = Storage::disk('public')->put('achievements-images', $request->banner);
        }

        // Update the achievement
        $achievement->update([...$fields, 'slug' => $slug]);

        return redirect('/achievements')->with('success', "$achievement->title berhasil di-update");
    }

    public function destroy(Achievement $achievement)
    {
        if ($achievement->banner) {
            Storage::disk('public')->delete($achievement->banner);
        }

        $achievement->delete();

        return back()->with('success', "$achievement->title berhasil dihapus");
    }
}
