<x-layouts.admin title="Kelas">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.course.index') }}">Kelas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Detail Kelas</h6>
                </x-slot>
                <table class="table table-bordered">
                    <tr>
                        <th>Title</th>
                        <td>{{ $course->title }}</td>
                    </tr>

                    <tr>
                        <th>Slug</th>
                        <td>{{ $course->slug }}</td>
                    </tr>

                    <tr>
                        <th>Deskripsi</th>
                        <td style="white-space: pre-line">
                            {!! $course->description !!}
                        </td>
                    </tr>

                    <tr>
                        <th>Thumbnail</th>
                        <td>
                            <img src="{{ asset($course->thumbnail) }}" alt="{{ $course->title }}" class="img-fluid">
                        </td>
                    </tr>

                    <tr>
                        <th>Mentor</th>
                        <td>{{ $course->instructor->name }}</td>
                    </tr>

                    <tr>
                        <th>Jumlah Pelajaran</th>
                        <td>{{ $course->lessons->count() }}</td>
                    </tr>

                    <tr>
                        <th>Detail Pembelajaran</th>
                        <td>
                            @foreach ($course->lessons as $lesson)
                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $lesson->sort }}. {{ $lesson->title }}</h5>
                                        <iframe width="100%" height="500"
                                            src="https://www.youtube.com/embed/{{ $lesson->video }}"
                                            title="Take Me Home, Country Roads - Music Travel Love (John Denver Cover)"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                                    </div>
                                </div>
                            @endforeach
                        </td>
                    </tr>
                </table>
                <x-slot name="footer">
                    <x-ui.base-button color="danger"
                        href="{{ route('admin.course.index') }}">Kembali</x-ui.base-button>
                </x-slot>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
