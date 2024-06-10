<?php

namespace App;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $courses = Course::inRandomOrder()->take(3)->get();

        return view('pages.app.landing', compact('courses'));
    }
}
