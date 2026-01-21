<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Client; 
use App\Models\Product;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Count articles by status using Eloquent
        $totalArticles = Article::count();
        $publishedArticles = Article::byStatus('published')->count();
        $draftArticles = Article::byStatus('draft')->count();
        $archivedArticles = Article::byStatus('archived')->count();

        // Total client pictures and products
        $totalClientPictures = Client::count();
        $totalProducts = Product::count();

        // Get articles count grouped by published date using Eloquent scopes
        $articlesByDate = Article::published()
            ->groupedByDate()
            ->get();

        // Get articles count grouped by category using Eloquent scopes
        $articlesByCategory = Article::published()
            ->groupedByCategory()
            ->get();

        // Prepare data for the date chart
        $labels = $articlesByDate->map(function ($item) {
            return Carbon::parse($item->publish_date)->format('Y-m-d');
        });
        $data = $articlesByDate->pluck('total');

        // Prepare data for the category pie chart
        $categoryLabels = $articlesByCategory->pluck('category');
        $categoryData = $articlesByCategory->pluck('total');

        // Pass the data to the view
        return view('back.dashboard.index', compact(
            'totalArticles', 
            'publishedArticles', 
            'draftArticles', 
            'archivedArticles', 
            'totalClientPictures',
            'totalProducts',
            'labels', 
            'data',
            'categoryLabels',
            'categoryData'
        ));
    }
}
