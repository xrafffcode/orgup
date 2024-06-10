<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class CourseController extends Controller
{

    public function __construct()
    {
        $this->middleware(['permission:course-list'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:course-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:course-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:course-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all();

        return view('pages.admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructors = Instructor::all();

        return view('pages.admin.course.create', compact('instructors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'instructor_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'lesson_title' => 'required',
            'lesson_video' => 'required',
            'lesson_sort' => 'required',
            'lesson_duration' => 'required',
            'thumbnail' => 'required',
        ], [
            'instructor_id.required' => 'Instructor harus dipilih',
            'title.required' => 'Judul harus diisi',
            'slug.required' => 'Slug harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'lesson_title.required' => 'Judul harus diisi',
            'lesson_video.required' => 'Video harus diisi',
            'lesson_sort.required' => 'Urutan harus diisi',
            'lesson_duration.required' => 'Durasi harus diisi',
            'thumbnail.required' => 'Thumbnail harus diisi',
        ]);

        $this->beginTransaction();

        try {

            $course = Course::create([
                'instructor_id' => $request->instructor_id,
                'thumbnail' => $request->file('thumbnail')->store('assets/course', 'public'),
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
            ]);

            foreach ($request->lesson_title as $key => $value) {
                $course->lessons()->create([
                    'title' => $value,
                    'video' => $request->lesson_video[$key],
                    'sort' => $request->lesson_sort[$key],
                    'duration' => $request->lesson_duration[$key],
                ]);
            }

            $this->commit();

            Swal::toast('Kelas telah ditambahkan', 'success');
        } catch (\Exception $e) {

            $this->rollback();

            Swal::toast($e->getMessage(), 'error');
        }

        return redirect()->route('admin.course.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Course::findOrFail($id);

        return view('pages.admin.course.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);

        $instructors = Instructor::all();

        return view('pages.admin.course.edit', compact('course', 'instructors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'instructor_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'lesson_title' => 'required',
            'lesson_video' => 'required',
            'lesson_sort' => 'required',
            'lesson_duration' => 'required',
            'thumbnail' => 'nullable',
        ], [
            'instructor_id.required' => 'Instructor harus dipilih',
            'title.required' => 'Judul harus diisi',
            'slug.required' => 'Slug harus diisi',
            'description.required' => 'Deskripsi harus diisi',
            'lesson_title.required' => 'Judul harus diisi',
            'lesson_video.required' => 'Video harus diisi',
            'lesson_sort.required' => 'Urutan harus diisi',
            'lesson_duration.required' => 'Durasi harus diisi',
        ]);

        $this->beginTransaction();

        try {

            $course = Course::findOrFail($id);

            $course->update([
                'instructor_id' => $request->instructor_id,
                'thumbnail' => $request->file('thumbnail') ? $request->file('thumbnail')->store('assets/course', 'public') : $course->thumbnail,
                'title' => $request->title,
                'slug' => $request->slug,
                'description' => $request->description,
            ]);

            foreach ($request->lesson_title as $key => $value) {
                $course->lessons()->updateOrCreate([
                    'id' => $request->lesson_id[$key],
                ], [
                    'title' => $value,
                    'video' => $request->lesson_video[$key],
                    'sort' => $request->lesson_sort[$key],
                    'duration' => $request->lesson_duration[$key],
                ]);
            }

            $this->commit();

            Swal::toast('Kelas telah diperbarui', 'success');
        } catch (\Exception $e) {

            $this->rollback();

            Swal::toast($e->getMessage(), 'error');
        }

        return redirect()->route('admin.course.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->beginTransaction();

        try {

            $course = Course::findOrFail($id);

            $course->delete();

            $this->commit();

            Swal::toast('Kelas telah dihapus', 'success');
        } catch (\Exception $e) {

            $this->rollback();

            Swal::toast($e->getMessage(), 'error');
        }

        return redirect()->route('admin.course.index');
    }
}
