<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = ['name', 'image', 'image_size', 'slug'];

    // Opsional: Anda bisa menambahkan metode untuk membuat slug
    public static function createSlug($name)
    {
        return Str::slug($name);
    }
}

