<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Schema;

class PostArticleController extends Controller
{
    public function index()
    {
        try {
            if (Schema::hasTable('articles')) {
                $latest_post = Article::where('status', 'published')
                                      ->latest()
                                      ->first();

                if ($latest_post) {
                    $articles = Article::where('id', '!=', $latest_post->id)
                                       ->where('status', 'published')
                                       ->latest()
                                       ->paginate(5);
                } else {
                    $articles = Article::where('status', 'published')
                                       ->latest()
                                       ->paginate(5);
                }
            } else {
                $latest_post = null;
                $articles = collect()->paginate(5);
            }
        } catch (\Exception $e) {
            $latest_post = null;
            $articles = collect()->paginate(5);
        }

        return view('artikel.index', [
            'latest_post' => $latest_post,
            'articles' => $articles,
        ]);
    }
}
