<x-layouts.admin title="Role">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item " aria-current="page">Manajemen Akun</li>
        <li class="breadcrumb-item active" aria-current="page">Role</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Guard Name</th>
                            <th>Hak Akses</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->guard_name }}</td>
                                <td class="d-flex flex-wrap">
                                    @forelse ($role->permissions as $permission)
                                        <span class="badge bg-primary m-1">{{ $permission->name }}</span>
                                    @empty
                                        <span class="badge bg-danger m-1">Tidak ada hak akses</span>
                                    @endforelse
                                </td>
                                <td>
                                    @can('role-edit')
                                        <x-ui.base-button color="warning" type="button"
                                            href="{{ route('admin.role.edit', $role->id) }}">
                                            Edit
                                        </x-ui.base-button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </x-slot>
                </x-ui.datatables>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
