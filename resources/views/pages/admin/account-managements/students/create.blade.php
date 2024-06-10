<x-layouts.admin title="Tambah Siswa">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item "><a href="{{ route('admin.student.index') }}">Siswa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Siswa</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Tambah Siswa</h6>
                </x-slot>
                <form action="{{ route('admin.student.store') }}" method="POST" enctype="multipart/form-data"
                    id="form">
                    @csrf

                    <x-forms.input label="Email" name="email" id="email" value="{{ old('email') }}" />
                    <x-forms.input label="Password" name="password" id="password" type="password" />
                    <x-forms.input label="Nama Lengkap" name="name" id="name" value="{{ old('name') }}" />

                    <x-ui.base-button color="danger" href="{{ route('admin.student.index') }}">
                        Kembali
                    </x-ui.base-button>

                    <x-ui.base-button color="primary" type="submit">
                        Tambah Siswa
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>
</x-layouts.admin>
