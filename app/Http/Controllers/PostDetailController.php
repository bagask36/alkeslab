<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class PostDetailController extends Controller
{
    public function show($slug)
    {
        // Fetch the article by slug with status published
        $article = Article::where('slug', $slug)->where('status', 'published')->firstOrFail();
    
        // Fetch 6 other articles that are published
        $other_articles = Article::where('id', '!=', $article->id)
            ->where('status', 'published') // Hanya ambil artikel yang published
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
