<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PostDetailController extends Controller
{
    public function show($slug)
    {
        // Menggunakan Eloquent scopes untuk query yang lebih clean
        $article = Article::published()
            ->bySlug($slug)
            ->firstOrFail();
    
        // Menggunakan Eloquent scopes untuk mendapatkan artikel lainnya
        $other_articles = Article::published()
            ->where('id', '!=', $article->id)
            ->latest()
            ->take(6)
            ->get();
    
        // Return the view with the article data and other articles
        return view('artikel.detail', [
            'article' => $article,
            'other_articles' => $other_articles,
        ]);
    }
}
