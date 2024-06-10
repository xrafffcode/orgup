<x-layouts.admin title="Edit Kelas">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item"><a href="{{ route('admin.course.index') }}">Manajemen Kelas</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Kelas</li>
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
                    <h6>Edit Kelas</h6>
                </x-slot>
                <form action="{{ route('admin.course.update', $course->id) }}" method="POST"
                    enctype="multipart/form-data" id="form">
                    @csrf
                    @method('PUT')

                    <x-forms.select label="Instruktur" name="instructor_id" id="instructor_id" :options="$instructors"
                        key="id" value="name" selected="{{ $course->instructor_id }}" />

                    <x-forms.input label="Judul" name="title" id="title" required value="{{ $course->title }}" />

                    <x-forms.input label="Slug" name="slug" id="slug" required value="{{ $course->slug }}" />

                    <x-forms.mde label="Deskripsi" name="description" id="description" required
                        value="{!! $course->description !!}" />

                    <x-forms.input label="Thumbnail" name="thumbnail" id="thumbnail" type="file" />

                    <p>Pembelajaran</p>
                    <button class="btn btn-primary mt-3" type="button" id="add-lesson">+</button>

                    <div id="lessons" class="mb-3">
                        @foreach ($course->lessons as $lesson)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="lesson-title-{{ $lesson->id }}">Judul</label>
                                        <input type="text" class="form-control" name="lesson_title[]"
                                            id="lesson-title-{{ $lesson->id }}" value="{{ $lesson->title }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="lesson-video-{{ $lesson->id }}">Video</label>
                                        <input type="text" class="form-control" name="lesson_video[]"
                                            id="lesson-video-{{ $lesson->id }}" value="{{ $lesson->video }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="lesson-sort-{{ $lesson->id }}">Urutan</label>
                                        <input type="number" class="form-control" name="lesson_sort[]"
                                            id="lesson-sort-{{ $lesson->id }}" value="{{ $lesson->sort }}">
                                    </div>

                                    <div class="mb-3">
                                        <label for="lesson-duration-{{ $lesson->id }}">Durasi</label>
                                        <input type="text" class="form-control" name="lesson_duration[]"
                                            id="lesson-duration-{{ $lesson->id }}" value="{{ $lesson->duration }}">
                                    </div>

                                    <button class="btn btn-danger" type="button">Hapus</button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <x-ui.base-button color="danger" href="{{ route('admin.course.index') }}">
                        Kembali
                    </x-ui.base-button>

                    <x-ui.base-button color="primary" type="submit">
                        Update Kelas
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>

    @push('custom-scripts')
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
                                <label for="lesson-title-new">Judul</label>
                                <input type="text" class="form-control" name="lesson_title[]" id="lesson-title-new">
                            </div>

                            <div class="mb-3">
                                <label for="lesson-video-new">Video</label>
                                <input type="text" class="form-control" name="lesson_video[]" id="lesson-video-new">
                            </div>

                            <div class="mb-3">
                                <label for="lesson-sort-new">Urutan</label>
                                <input type="number" class="form-control" name="lesson_sort[]" id="lesson-sort-new">
                            </div>

                            <div class="mb-3">
                                <label for="lesson-duration-new">Durasi</label>
                                <input type="text" class="form-control" name="lesson_duration[]" id="lesson-duration-new">
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
            });
        </script>
    @endpush
</x-layouts.admin>
