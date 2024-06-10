<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:article-list'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:article-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:article-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:article-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return view('pages.admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'thumbnail' => 'required',
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
        ], [
            'thumbnail.required' => 'Thumbnail harus diisi',
            'title.required' => 'Judul harus diisi',
            'content.required' => 'Content harus diisi',
            'slug.required' => 'Slug harus diisi',
        ]);

        $data['thumbnail'] = $request->file('thumbnail')->store('article/thumbnail', 'public');

        Article::create($data);


        Swal::toast('Data Berhasil Di Tambahkan', 'success');

        return redirect()->route('admin.article.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);

        return view('pages.admin.article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);

        return view('pages.admin.article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'thumbnail' => 'required',
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
        ], [
            'thumbnail.required' => 'Thumbnail harus diisi',
            'title.required' => 'Judul harus diisi',
            'content.required' => 'Content harus diisi',
            'slug.required' => 'Slug harus diisi',
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('article/thumbnail', 'public');
        }

        Article::find($id)->update($data);

        Swal::toast('Data Berhasil Di Update', 'success');

        return redirect()->route('admin.article.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::find($id)->delete();

        Swal::toast('Data Berhasil Di Hapus', 'success');
    }
}
