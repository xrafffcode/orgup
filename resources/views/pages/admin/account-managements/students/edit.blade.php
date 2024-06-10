<x-layouts.admin title="Edit Siswa">

    <x-ui.breadcumb-admin>
        <li class="breadcrumb-item "><a href="{{ route('admin.student.index') }}">Siswa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Siswa</li>
    </x-ui.breadcumb-admin>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <x-ui.base-card>
                <x-slot name="header">
                    <h6>Edit Siswa</h6>
                </x-slot>
                <form action="{{ route('admin.student.update', $student->id) }}" method="POST"
                    enctype="multipart/form-data" id="form">
                    @csrf
                    @method('PUT')

                    <x-forms.input label="Email" name="email" id="email" value="{{ $student->user->email }}"
                        disabled />

                    <x-forms.input label="Password" name="password" id="password" type="password" />

                    <x-forms.input label="Nama Lengkap" name="name" id="name" value="{{ $student->name }}" />


                    <x-ui.base-button color="danger" href="{{ route('admin.student.index') }}">
                        Kembali
                    </x-ui.base-button>

                    <x-ui.base-button color="primary" type="submit">
                        Update Siswa
                    </x-ui.base-button>
                </form>
            </x-ui.base-card>
        </div>
    </div>


</x-layouts.admin>
