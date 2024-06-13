<x-layouts.dashboard-user title="Pengaturan">
    <h3 class="fw-bold mb-3">Pengaturan</h3>

    <p>Avatar Saya</p>
    <img src="{{ asset(Auth::user()->profile()->avatar) }}" class="avatar mb-3" alt="avatar">

    <form action="{{ route('student.setting.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <x-forms.input label="Foto Profil" name="avatar" id="avatar" type="file" />

        <x-forms.input label="Email" name="email" id="email" value="{{ Auth::user()->email }}" disabled />

        <x-forms.input label="Password" name="password" id="password" type="password" />

        <x-forms.input label="Nama Lengkap" name="name" id="name" value="{{ Auth::user()->profile()->name }}" />

        <x-forms.input label="Username" name="username" id="username"
            value="{{ Auth::user()->profile()->username }}" />

        <x-ui.base-button color="primary" type="submit">
            Simpan
        </x-ui.base-button>
    </form>
</x-layouts.dashboard-user>
