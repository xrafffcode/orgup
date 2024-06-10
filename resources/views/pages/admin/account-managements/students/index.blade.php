<x-layouts.admin title="Siswa">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item " aria-current="page">Manajemen Akun</li>
        <li class="breadcrumb-item active" aria-current="page">Siswa</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    @can('student-create')
                        <x-ui.base-button color="primary" type="button" href="{{ route('admin.student.create') }}">
                            Tambah Siswa
                        </x-ui.base-button>
                    @endcan
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->user->email }}</td>
                                <td>{{ $student->username }}</td>
                                <td>
                                    <x-ui.base-button color="primary" type="button"
                                        href="{{ route('admin.student.show', $student->id) }}">
                                        Detail
                                    </x-ui.base-button>


                                    @can('student-edit')
                                        <x-ui.base-button color="warning" type="button"
                                            href="{{ route('admin.student.edit', $student->id) }}">
                                            Edit
                                        </x-ui.base-button>
                                    @endcan


                                    @can('student-delete')
                                        <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST"
                                            class="d-inline">
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
