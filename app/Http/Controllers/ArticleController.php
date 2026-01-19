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
            $data = Article::select('id', 'title', 'category', 'status', 'created_at')->latest()->get();
    
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('publish_date', function ($row) {
                    return $row->created_at->format('d-m-Y');
                })
                ->addColumn('action', function ($row) {
                    return '<a href="'.route('articles.edit', $row->id).'" class="btn btn-primary btn-sm mr-2">Edit</a>
                            <form action="'.route('articles.destroy', $row->id).'" method="POST" style="display:inline;">
                                '.csrf_field().'
                                '.method_field('DELETE').'
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure?\')">Delete</button>
                            </form>';
                })
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
            'status' => 'required|in:draft,published,archived', // perbaikan status
        ]);

        $descWithEmbed = $this->convertOembedToIframe($request->desc);

        // Membuat artikel baru
        $article = new Article();
        $article->title = $request->title;
        $article->desc = $descWithEmbed; // Simpan deskripsi yang sudah dimodifikasi
        $article->category = $request->category;
        $article->status = $request->status;

        // Membuat slug otomatis dari title
        $article->slug = Str::slug($request->title); // Membuat slug dari judul

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('photos', 'public');
            $article->photo = $path;
        }

        $article->user_id = auth()->id();
        $article->status = $request->status; 
        $article->save();

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
        ]);

        // Mengupdate data artikel
        $article->title = $request->title;
        $article->desc = $this->convertOembedToIframe($request->desc); // Mengonversi oembed ke iframe
        $article->category = $request->category;
        $article->status = $request->status;

        // Membuat slug otomatis dari title
        $article->slug = Str::slug($request->title);

        // Mengupload foto jika ada
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($article->photo) {
                Storage::disk('public')->delete($article->photo);
            }

            // Simpan foto baru
            $path = $request->file('photo')->store('photos', 'public');
            $article->photo = $path;
        }

        // Simpan perubahan
        $article->save();

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
