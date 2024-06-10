<x-layouts.admin title="Tambah Instruktur">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item "><a href="{{ route('admin.instructor.index') }}">Instruktur</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Instruktur</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Tambah Instruktur</h6>
                </x-slot>
                <form action="{{ route('admin.instructor.store') }}" method="POST" enctype="multipart/form-data"
                    id="form">
                    @csrf

                    <img src="" style="max-height: 200px; object-fit: contain;"
                        class="d-none mb-3"id="avatar-picture-preview">

                    <x-forms.input label="Foto Profil" name="avatar" id="avatar" type="file" required />

                    <x-forms.input label="Email" name="email" id="email" value="{{ old('email') }}" />
                    <x-forms.input label="Password" name="password" id="password" type="password" />
                    <x-forms.input label="Nama Lengkap" name="name" id="name" value="{{ old('name') }}" />
                    <x-forms.input label="Deskripsi" name="description" id="description"
                        value="{{ old('description') }}" />


                    <x-ui.base-button color="danger" href="{{ route('admin.instructor.index') }}">
                        Kembali
                    </x-ui.base-button>

                    <x-ui.base-button color="primary" type="submit">
                        Tambah Instruktur
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>

    @push('plugin-scripts')
        <script>
            const profilePicture = document.querySelector('#avatar');
            const profilePicturePreview = document.querySelector('#avatar-picture-preview');

            profilePicture.addEventListener('change', (event) => {
                const file = event.target.files[0];
                profilePicturePreview.src = URL.createObjectURL(file);
                profilePicturePreview.classList.remove('d-none');
            });
        </script>
    @endpush
</x-layouts.admin>
