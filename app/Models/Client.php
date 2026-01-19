<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
    protected $fillable = ['name', 'image', 'image_size'];

    // Optionally, you can add a method to generate slug
    public static function createSlug($name)
    {
        return Str::slug($name);
    }
}
