<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use RealRashid\SweetAlert\Facades\Alert as Swal;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:role-list'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:role-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:role-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:role-delete'], ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view('pages.admin.account-managements.roles.index', compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();

        return view('pages.admin.account-managements.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, string $id)
    {
        $data = $request->validated();

        $this->beginTransaction();

        try {
            $role = Role::find($id);

            $role->syncPermissions($data['permission']);

            $this->commit();

            Swal::toast('Data role berhasil diperbarui', 'success');
        } catch (\Exception $e) {
            $this->rollback();

            Swal::toast($e->getMessage(), 'error');
        }

        return redirect()->route('admin.role.index');
    }
}
