<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Teknis extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'image_size', 'slug'];

    // Set slug automatically when creating or updating
    public static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->name);
            }
        });
    }
}

