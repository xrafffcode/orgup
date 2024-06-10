<x-layouts.admin title="Kelas">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item " aria-current="page">Manajemen Kelas</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <x-ui.base-button color="primary" type="button" href="{{ route('admin.course.create') }}">
                        Tambah Kelas
                    </x-ui.base-button>
                </x-slot>
                <x-ui.datatables>
                    <x-slot name="thead">
                        <tr>
                            <th>No</th>
                            <th>Mentor</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Thumbnail</th>
                            <th>Jumlah Pembelajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @foreach ($courses as $course)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $course->instructor->name }}</td>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->slug }}</td>
                                <td>
                                    <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}"
                                        width="100">
                                </td>
                                <td>{{ $course->lessons->count() }}</td>
                                <td>
                                    <x-ui.base-button color="primary" type="button"
                                        href="{{ route('admin.course.show', $course->id) }}">
                                        Detail
                                    </x-ui.base-button>

                                    @can('course-edit')
                                        <x-ui.base-button color="warning" type="button"
                                            href="{{ route('admin.course.edit', $course->id) }}">
                                            Edit
                                        </x-ui.base-button>
                                    @endcan

                                    @can('course-delete')
                                        <form action="{{ route('admin.course.destroy', $course->id) }}" method="POST"
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
