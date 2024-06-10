<x-layouts.admin title="Instruktur">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item " aria-current="page">Manajemen Akun</li>
        <li class="breadcrumb-item active" aria-current="page">Instruktur</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    @can('instructor-create')
                        <x-ui.base-button color="primary" type="button" href="{{ route('admin.instructor.create') }}">
                            Tambah Instruktur
                        </x-ui.base-button>
                    @endcan
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($instructors as $instructor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $instructor->name }}</td>
                                <td>{{ $instructor->user->email }}</td>
                                <td>{{ $instructor->description }}</td>
                                <td>
                                    <x-ui.base-button color="primary" type="button"
                                        href="{{ route('admin.instructor.show', $instructor->id) }}">
                                        Detail
                                    </x-ui.base-button>


                                    @can('instructor-edit')
                                        <x-ui.base-button color="warning" type="button"
                                            href="{{ route('admin.instructor.edit', $instructor->id) }}">
                                            Edit
                                        </x-ui.base-button>
                                    @endcan


                                    @can('instructor-delete')
                                        <form action="{{ route('admin.instructor.destroy', $instructor->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <x-ui.base-button color="danger" type="submit"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                Hapus
                                            </x-ui.base-button>
                                        </form>
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
