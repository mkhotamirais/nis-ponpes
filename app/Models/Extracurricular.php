<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{

    protected $fillable = [
        'name',
        'slug',
        'detail',
        'banner',
        'images' => 'nullable|array',
        'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function extracurricularimages()
    {
        return $this->hasMany(Extracurricularimage::class);
    }
}
