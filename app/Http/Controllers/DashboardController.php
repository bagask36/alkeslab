<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Client; 
use App\Models\Product; 
use Illuminate\Support\Facades\DB; // Import the DB facade

class DashboardController extends Controller
{
    public function index()
    {
        // Count articles by status
        $totalArticles = Article::count();
        $publishedArticles = Article::where('status', 'published')->count();
        $draftArticles = Article::where('status', 'draft')->count();
        $archivedArticles = Article::where('status', 'archived')->count();

        // Total client pictures and products
        $totalClientPictures = Client::count(); // Adjust if necessary
        $totalProducts = Product::count(); // Adjust if necessary

        // Get articles count grouped by published date
        $articlesByDate = Article::select(DB::raw('DATE(created_at) as publish_date'), DB::raw('count(*) as total'))
            ->where('status', 'published')
            ->groupBy('publish_date')
            ->orderBy('publish_date')
            ->get();

        // Get articles count grouped by category
        $articlesByCategory = Article::select('category', DB::raw('count(*) as total'))
            ->where('status', 'published') // Assuming you want only published articles
            ->groupBy('category')
            ->get();

        // Prepare data for the date chart
        $labels = $articlesByDate->pluck('publish_date')->map(function ($date) {
            return \Carbon\Carbon::parse($date)->format('Y-m-d'); // Format the date
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
            'totalClientPictures', // Include this variable
            'totalProducts',       // Include this variable
            'labels', 
            'data',
            'categoryLabels',
            'categoryData'
        ));
    }
}
