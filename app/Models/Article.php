<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'desc',
        'category',
        'photo',
        'slug',
        'status',
        'hashtags',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope untuk artikel yang published
     */
    public function scopePublished(Builder $query): Builder
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope untuk artikel berdasarkan status
     */
    public function scopeByStatus(Builder $query, string $status): Builder
    {
        return $query->where('status', $status);
    }

    /**
     * Scope untuk artikel berdasarkan kategori
     */
    public function scopeByCategory(Builder $query, string $category): Builder
    {
        return $query->where('category', $category);
    }

    /**
     * Scope untuk artikel berdasarkan slug
     */
    public function scopeBySlug(Builder $query, string $slug): Builder
    {
        return $query->where('slug', $slug);
    }

    /**
     * Scope untuk artikel terbaru
     */
    public function scopeLatest(Builder $query): Builder
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Scope untuk menghitung artikel per tanggal
     * Menggunakan Eloquent methods dengan selectRaw hanya untuk DATE()
     */
    public function scopeGroupedByDate(Builder $query): Builder
    {
        return $query->selectRaw('DATE(created_at) as publish_date')
            ->selectRaw('count(*) as total')
            ->groupByRaw('DATE(created_at)')
            ->orderBy('publish_date');
    }

    /**
     * Scope untuk menghitung artikel per kategori
     * Menggunakan Eloquent methods
     */
    public function scopeGroupedByCategory(Builder $query): Builder
    {
        return $query->select('category')
            ->selectRaw('count(*) as total')
            ->groupBy('category');
    }

    /**
     * Relasi ke User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
