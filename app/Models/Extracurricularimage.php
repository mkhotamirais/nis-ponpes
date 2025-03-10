<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extracurricularimage extends Model
{
    protected $fillable = ['image_path'];
    public function extracurricular()
    {
        return $this->belongsTo(Extracurricular::class);
    }
}
