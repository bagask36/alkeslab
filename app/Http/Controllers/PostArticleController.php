<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; 

class PostArticleController extends Controller
{
    public function index()
{
    $latest_post = Article::where('status', 'published')
                          ->latest()
                          ->first();

    // Mengambil artikel lain yang terbaru, kecuali artikel terbaru, dan hanya yang 'published'
    $articles = Article::where('id', '!=', $latest_post->id)
                       ->where('status', 'published')
                       ->latest()
                       ->paginate(5);

    return view('artikel.index', [
        'latest_post' => $latest_post,
        'articles' => $articles,
    ]);
}


}
