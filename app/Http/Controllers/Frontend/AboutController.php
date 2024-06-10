<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $instructors = Instructor::all();

        return view('pages.app.about.index', compact('instructors'));
    }
}
