<x-layouts.admin title="Siswa">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.student.index') }}">Siswa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Detail Siswa</h6>
                </x-slot>
                <table class="table table-bordered">
                    <tr>
                        <th>Avatar</th>
                        <td>
                            <img src="{{ $student->avatar }}" alt="" width="100">
                        </td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{ $student->name }}</td>
                    </tr>
                    <tr>
                        <th>Username</th>
                        <td>{{ $student->username }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $student->user->email }}</td>
                    </tr>

                </table>
                <x-slot name="footer">
                    <x-ui.base-button color="danger"
                        href="{{ route('admin.student.index') }}">Kembali</x-ui.base-button>
                </x-slot>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
