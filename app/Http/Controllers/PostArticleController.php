<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PostArticleController extends Controller
{
    public function index()
    {
        // Menggunakan Eloquent scopes untuk query yang lebih clean
        $latest_post = Article::published()
            ->latest()
            ->first();

        // Menggunakan Eloquent untuk mendapatkan artikel lainnya
        $articles = Article::published()
            ->when($latest_post, function ($query) use ($latest_post) {
                return $query->where('id', '!=', $latest_post->id);
            })
            ->latest()
            ->paginate(5);

        return view('artikel.index', [
            'latest_post' => $latest_post,
            'articles' => $articles,
        ]);
    }
}
