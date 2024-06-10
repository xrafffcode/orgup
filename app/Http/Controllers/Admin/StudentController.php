<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:student-list'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:student-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:student-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:student-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();

        return view('pages.admin.account-managements.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.account-managements.students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);
        $data['username'] = strstr($data['email'], '@', true);

        $this->beginTransaction();

        try {
            $user = User::create($data);

            $user->assignRole('student');

            $user->student()->create($data);

            $this->commit();

            Swal::toast('Data Siswa berhasil ditambahkan', 'success');
        } catch (\Exception $e) {

            $this->rollback();

            Swal::toast($e->getMessage(), 'error');
        }

        return redirect()->route('admin.student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);

        return view('pages.admin.account-managements.students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);

        return view('pages.admin.account-managements.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, string $id)
    {
        $student = Student::find($id);

        $data = $request->validated();

        if ($request->password) {
            $data['password'] = bcrypt($data['password']);
        }

        $this->beginTransaction();

        try {
            $student->update($data);

            $this->commit();

            Swal::toast('Data Siswa berhasil diubah', 'success');
        } catch (\Exception $e) {

            $this->rollback();

            Swal::toast($e->getMessage(), 'error');
        }

        return redirect()->route('admin.student.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);

        $this->beginTransaction();

        try {
            $student->delete();

            $student->user->delete();

            $this->commit();

            Swal::toast('Data Siswa berhasil dihapus', 'success');
        } catch (\Exception $e) {

            $this->rollback();

            Swal::toast($e->getMessage(), 'error');
        }

        return redirect()->route('admin.student.index');
    }
}
