<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstructorRequest;
use App\Models\Instructor;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class InstructorController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:instructor-list'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:instructor-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:instructor-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:instructor-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructors = Instructor::all();

        return view('pages.admin.account-managements.instructors.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.account-managements.instructors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstructorRequest $request)
    {
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);
        $data['username'] = strstr($data['email'], '@', true);
        $data['avatar'] = $request->file('avatar')->store('assets/avatar', 'public');

        $this->beginTransaction();

        try {
            $user = User::create($data);

            $user->assignRole('instructor');

            $user->instructor()->create($data);

            $this->commit();

            Swal::toast('Data Instruktur berhasil ditambahkan', 'success');
        } catch (\Exception $e) {
            $this->rollback();

            Swal::toast($e->getMessage(), 'error');
        }

        return redirect()->route('admin.instructor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $instructor = Instructor::find($id);

        return view('pages.admin.account-managements.instructors.show', compact('instructor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $instructor = Instructor::find($id);

        return view('pages.admin.account-managements.instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstructorRequest $request, string $id)
    {
        $instructor = Instructor::find($id);

        $data = $request->validated();

        if ($request->password) {
            $data['password'] = bcrypt($data['password']);
        }

        if ($request->file('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('assets/avatar', 'public');
        }

        $this->beginTransaction();

        try {
            $instructor->update($data);

            $this->commit();

            Swal::toast('Data Instruktur berhasil diubah', 'success');
        } catch (\Exception $e) {
            $this->rollback();

            Swal::toast($e->getMessage(), 'error');
        }

        return redirect()->route('admin.instructor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instructor = Instructor::find($id);

        $this->beginTransaction();

        try {
            $instructor->delete();

            $instructor->user->delete();

            $this->commit();

            Swal::toast('Data Instruktur berhasil dihapus', 'success');
        } catch (\Exception $e) {
            $this->rollback();

            Swal::toast($e->getMessage(), 'error');
        }

        return redirect()->route('admin.instructor.index');
    }
}
