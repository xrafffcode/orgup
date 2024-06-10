<x-layouts.auth title="Verifikasi Akun">
    <form method="POST" action="{{ route('verification.post') }}" class="login-form">
        @csrf
        <div class="login-top">
            <img src="{{ asset('app/images/orgup.png') }}" alt="logo" class="logo" width="100">
            <h3>
                Verifikasi Akun
            </h3>
            <p>Cek email anda untuk kode verifikasi</p>
        </div>
        <div class="mb-3">
            <label>Kode Verifikasi</label>
            <input placeholder="Kode Verifikasi" type="text" id="otp" name="otp"
                class="@error('otp') is-invalid @enderror">
            @error('otp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" id="button" name="submit">
            Verifikasi Akun
        </button>
    </form>
</x-layouts.auth>
