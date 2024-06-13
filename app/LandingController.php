<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Course;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $courses = Course::inRandomOrder()->take(3)->get();
        $articles = Article::inRandomOrder()->take(4)->get();

        return view('pages.app.landing', compact('courses', 'articles'));
    }
}
