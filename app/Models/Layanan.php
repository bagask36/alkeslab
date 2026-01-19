<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Layanan extends Model
{
    protected $table = 'layanan';
    protected $fillable = ['name', 'image', 'slug']; // Tambahkan 'slug' jika Anda menggunakannya

    // Optional: You can add a method to generate slug
    public static function createSlug($name)
    {
        return Str::slug($name);
    }
}
