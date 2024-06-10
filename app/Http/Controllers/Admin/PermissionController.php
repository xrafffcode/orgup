<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert as Swal;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:permission-list'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:permission-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:permission-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:permission-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('pages.admin.account-managements.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.account-managements.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        $data = $request->validated();

        $this->beginTransaction();

        try {
            Permission::create($data);

            $this->commit();

            Swal::toast('Data permission berhasil ditambahkan', 'success');
        } catch (\Exception $e) {
            $this->rollback();

            Swal::toast($e->getMessage(), 'error');
        }

        return redirect()->route('admin.permission.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = Permission::find($id);

        return view('pages.admin.account-managements.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = Permission::find($id);

        return view('pages.admin.account-managements.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, string $id)
    {
        $data = $request->validated();

        $this->beginTransaction();

        try {
            $permission = Permission::find($id);

            $permission->update($data);

            $this->commit();

            Swal::toast('Data permission berhasil diubah', 'success');
        } catch (\Exception $e) {
            $this->rollback();

            Swal::toast($e->getMessage(), 'error');
        }

        return redirect()->route('admin.permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->beginTransaction();

        try {
            $permission = Permission::find($id);

            $permission->delete();

            $this->commit();

            Swal::toast('Data permission berhasil dihapus', 'success');
        } catch (\Exception $e) {
            $this->rollback();

            Swal::toast($e->getMessage(), 'error');
        }

        return redirect()->route('admin.permission.index');
    }
}
