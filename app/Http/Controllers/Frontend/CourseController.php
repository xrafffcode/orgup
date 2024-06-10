<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();

        return view('pages.app.course.index', compact('courses'));
    }

    public function show($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        return view('pages.app.course.show', compact('course'));
    }

    public function enroll($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        $this->beginTransaction();

        try {
            Enrollment::create([
                'student_id' => auth()->user()->student->id,
                'course_id' => $course->id,
                'date' => now(),
            ]);

            $this->commitTransaction();

            Swal::success('Success', 'Kamu berhasil mendaftar kelas ini');

            return redirect()->back();
        } catch (\Throwable $th) {
            $this->rollback();

            Swal::error('Error', $th->getMessage());

            return redirect()->back();
        }
    }

    public function play($slug)
    {
        if (!auth()->user()->hasRole('student')) {
            return redirect()->route('app.course.index');
        }

        $course = Course::where('slug', $slug)->firstOrFail();

        $enrolled = Enrollment::where('student_id', auth()->user()->student->id)
            ->where('course_id', $course->id)
            ->exists();

        if (!$enrolled) {
            return redirect()->route('app.course.index');
        }

        return view('pages.app.course.play', compact('course'));
    }
}
