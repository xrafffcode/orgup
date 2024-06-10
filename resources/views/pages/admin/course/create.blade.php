<x-layouts.admin title="Tambah Kelas">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item "><a href="{{ route('admin.course.index') }}">Manajemen Kelas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Kelas</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        @if ($errors->any())
            <div class="col-md-12 grid-margin">
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Tambah Kelas</h6>
                </x-slot>
                <form action="{{ route('admin.course.store') }}" method="POST" enctype="multipart/form-data"
                    id="form">
                    @csrf

                    <x-forms.select label="Instruktur" name="instructor_id" id="instructor_id" :options="$instructors"
                        key="id" value="name" />

                    <x-forms.input label="Judul" name="title" id="title" required />

                    <x-forms.input label="Slug" name="slug" id="slug" required />

                    <x-forms.mde label="Deskripsi" name="description" id="description" required />

                    <x-forms.input label="Thumbnail" name="thumbnail" id="thumbnail" type="file" required />

                    <p>Pembelajaran</p>
                    <button class="btn btn-primary mt-3" type="button" id="add-lesson">+</button>

                    <div id="lessons" class="mb-3"></div>


                    <x-ui.base-button color="danger" href="{{ route('admin.course.index') }}">
                        Kembali
                    </x-ui.base-button>

                    <x-ui.base-button color="primary" type="submit">
                        Tambah Kelas
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>

    @push('plugin-scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const title = document.querySelector('#title');
                const slug = document.querySelector('#slug');

                title.addEventListener('keyup', function() {
                    const nameValue = title.value;
                    slug.value = nameValue.trim().toLowerCase().split(' ').join('-');
                });

                document.querySelector('#add-lesson').addEventListener('click', function() {
                    const lessonHtml = `
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="lesson-title">Judul</label>
                                <input type="text" class="form-control" name="lesson_title[]" id="lesson-title">
                            </div>

                            <div class="mb-3">
                                <label for="lesson-video">Video</label>
                                <input type="text" class="form-control" name="lesson_video[]" id="lesson-video">
                            </div>

                            <div class="mb-3">
                                <label for="lesson-sort">Urutan</label>
                                <input type="number" class="form-control" name="lesson_sort[]" id="lesson-sort">
                            </div>

                            <div class="mb-3">
                                <label for="lesson-duration">Durasi</label>
                                <input type="text" class="form-control" name="lesson_duration[]" id="lesson-duration">
                            </div>

                            <button class="btn btn-danger" type="button">Hapus</button>
                        </div>
                    </div>
                `;
                    document.querySelector('#lessons').insertAdjacentHTML('beforeend', lessonHtml);
                });

                document.querySelector('#lessons').addEventListener('click', function(e) {
                    if (e.target.classList.contains('btn-danger')) {
                        e.target.parentElement.parentElement.remove();
                    }
                });

                document.querySelector('#form').addEventListener('submit', function() {
                    const videoInput = document.querySelector('#lesson-video');

                    videoInput.value = videoInput.value.split('youtu.be/')[1];

                    const videoId = videoInput.value;

                    videoInput.value = `https://www.youtube.com/embed/${videoId}`;

                    document.querySelector('#form').submit();
                })
            });
        </script>
    @endpush
</x-layouts.admin>
