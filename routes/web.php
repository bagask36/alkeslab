<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController; 
use App\Http\Controllers\PostArticleController;
use App\Http\Controllers\PostDetailController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPageController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ClientPageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LegalitasController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TeknisController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|-------------------------------------------------------------------------- 
| Web Routes 
|-------------------------------------------------------------------------- 
| 
| Here is where you can register web routes for your application. These 
| routes are loaded by the RouteServiceProvider and all of them will 
| be assigned to the "web" middleware group. Make something great! 
| 
*/

Route::get('/generate-storage-link', function () {
    Artisan::call('storage:link');
    
    return response()->json([
        'message' => 'Storage link has been generated successfully!'
    ]);
});


Route::get('/', [ClientPageController::class, 'index'])->name('home');

Route::get('/tentang-kami', [ClientPageController::class, 'tentangKamiIndex'])->name('tentang-kami.index');


Route::get('/produk-kami', [ProductPageController::class, 'index'])->name('produk-kami.index');

Route::get('/kontak-kami', function () {
    return view('kontak.index');
});

Route::get('/layanan-kami', function () {
    return view('layanan-kami.index');
});

Route::get('/kontak-kami', function () {
    return view('kontak.index');
});


// Rute untuk halaman daftar artikel
Route::get('/berita', [PostArticleController::class, 'index'])->name('artikel.index');

// Rute untuk menampilkan artikel berdasarkan slug
Route::get('/berita/{slug}', [PostDetailController::class, 'show'])->name('artikel.detail');


// Rute untuk login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // Rute untuk menampilkan form login
Route::post('/login', [LoginController::class, 'login']); // Rute untuk memproses login

// Rute untuk dashboard dan artikel
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // Dashboard hanya untuk pengguna yang sudah login
    Route::resource('articles', ArticleController::class); // Rute untuk artikel juga dilindungi oleh auth
    Route::resource('products', ProductController::class);
    Route::resource('clients', ClientController::class);
    Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::resource('projects', ProjectController::class);
    Route::resource('teknis', TeknisController::class)->parameters([
        'teknis' => 'tekni'
    ]);
    Route::resource('layanan', LayananController::class);
    Route::resource('legalitas', LegalitasController::class);     

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Rute untuk logout
});

