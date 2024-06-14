<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Course;

class LandingController extends Controller
{
    public function index()
    {
        $courses = Course::inRandomOrder()->take(4)->get();
        $articles = Article::inRandomOrder()->take(4)->get();

        return view('pages.app.landing', compact('courses', 'articles'));
    }
}
