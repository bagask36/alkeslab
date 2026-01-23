<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Tambahkan ini untuk menggunakan Str

class ArticleController extends Controller
{
    // Menampilkan semua artikel
    public function index()
    {
        if (request()->ajax()) {
            $data = Article::select(['id', 'title', 'category', 'status', 'created_at'])
                ->latest()
                ->get();
    
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('publish_date', function ($article) {
                    return $article->created_at->format('d-m-Y');
                })
                ->addColumn('action', function ($article) {
                    $viewUrl = route('articles.show', $article->id);
                    $editUrl = route('articles.edit', $article->id);
                    $deleteUrl = route('articles.destroy', $article->id);
                    $csrf = csrf_field();
                    $method = method_field('DELETE');
                    
                    return '<div class="flex items-center justify-center gap-2">
                                <a href="'.$viewUrl.'" class="action-btn action-btn-view" data-tooltip="Lihat Detail">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                </a>
                                <a href="'.$editUrl.'" class="action-btn action-btn-edit" data-tooltip="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>
                                <form action="'.$deleteUrl.'" method="POST" style="display:inline;" class="action-btn-form">
                                    '.$csrf.'
                                    '.$method.'
                                    <button type="submit" class="action-btn action-btn-delete" data-tooltip="Hapus" onclick="event.preventDefault(); Swal.fire({title: \'Apakah Anda yakin?\', text: \'Apakah Anda yakin ingin menghapus artikel ini?\', icon: \'warning\', showCancelButton: true, confirmButtonColor: \'#ef4444\', cancelButtonColor: \'#6b7280\', confirmButtonText: \'Ya, Hapus!\', cancelButtonText: \'Batal\', reverseButtons: true}).then((result) => { if (result.isConfirmed) { this.closest(\'form\').submit(); } });">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('back.articles.index');
    }

    // Menampilkan formulir untuk membuat artikel baru
    public function create()
    {
        return view('back.articles.create'); // Path yang benar
    }

    // Menyimpan artikel baru
    public function store(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'category' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:draft,published,archived',
            'hashtags' => 'nullable|string|max:500',
        ]);

        $descWithEmbed = $this->convertOembedToIframe($request->desc);

        // Membuat artikel baru menggunakan Eloquent mass assignment
        $articleData = [
            'title' => $request->title,
            'desc' => $descWithEmbed,
            'category' => $request->category,
            'status' => $request->status,
            'hashtags' => $request->hashtags,
            'slug' => Str::slug($request->title),
            'user_id' => auth()->id(),
        ];

        if ($request->hasFile('photo')) {
            $articleData['photo'] = $request->file('photo')->store('photos', 'public');
        }

        $article = Article::create($articleData);

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }

    // Menampilkan artikel tertentu
    public function show(Article $article)
    {
        return view('back.articles.show', compact('article')); // Path yang benar
    }

    // Menampilkan formulir untuk mengedit artikel
    public function edit(Article $article)
    {
        return view('back.articles.edit', compact('article'));
    }

    // Mengupdate artikel
    public function update(Request $request, Article $article)
    {
        // Validasi data yang diterima
        $request->validate([
            'title' => 'required|string|max:255',
            'desc' => 'required|string',
            'category' => 'required|string|max:255',
            'status' => 'required|in:draft,published,archived',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hashtags' => 'nullable|string|max:500',
        ]);

        // Mengupdate data artikel menggunakan Eloquent mass assignment
        $updateData = [
            'title' => $request->title,
            'desc' => $this->convertOembedToIframe($request->desc),
            'category' => $request->category,
            'status' => $request->status,
            'hashtags' => $request->hashtags,
            'slug' => Str::slug($request->title),
        ];

        // Mengupload foto jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($article->photo) {
                Storage::disk('public')->delete($article->photo);
            }

            // Simpan foto baru
            $updateData['photo'] = $request->file('photo')->store('photos', 'public');
        }

        // Update menggunakan Eloquent
        $article->update($updateData);

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }
    private function convertOembedToIframe($desc)
    {
        // Regular expression untuk menangkap URL dari <oembed> tag
        return preg_replace_callback(
            '/<oembed url="https:\/\/youtu\.be\/([^"]+)"><\/oembed>/',
            function ($matches) {
                $videoId = $matches[1];
                return '<div class="video-responsive">
                            <iframe src="https://www.youtube.com/embed/' . $videoId . '" frameborder="0" allowfullscreen></iframe>
                        </div>';
;
            },
            $desc
        );
    }

    // Menghapus artikel
    public function destroy(Article $article)
    {
        // Hapus foto jika ada
        if ($article->photo) {
            Storage::disk('public')->delete($article->photo);
        }

        $article->delete(); // Hapus artikel

        return redirect()->route('articles.index')->with('success', 'Article deleted successfully.');
    }
}
