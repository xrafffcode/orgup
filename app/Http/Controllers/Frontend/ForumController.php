<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Theard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumController extends Controller
{
    public function index()
    {
        $threads = Theard::all();

        return view('pages.app.forum.index', compact('threads'));
    }

    public function show($id)
    {
        $theard = Theard::where('id', $id)->firstOrFail();

        return view('pages.app.forum.show', compact('theard'));
    }

    public function create()
    {
        return view('pages.app.forum.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ], [
            'title.required' => 'Judul topik harus diisi',
            'content.required' => 'Isi topik harus diisi',
        ]);

        $this->beginTransaction();

        $theard = Theard::create([
            'student_id' => Auth::user()->student->id,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        $this->commit();

        return redirect()->route('app.forum.show', [$theard->id]);
    }

    public function comment($id, Request $request)
    {
        $theard = Theard::where('id', $id)->firstOrFail();

        Comment::create([
            'theard_id' => $theard->id,
            'student_id' => Auth::user()->student->id,
            'comment' => $request->comment,
        ]);

        return redirect()->route('app.forum.show', [$theard->id]);
    }
}
