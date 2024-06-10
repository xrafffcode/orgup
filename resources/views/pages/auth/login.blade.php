<x-layouts.auth title="Masuk">
    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf
        <div class="login-top">
            <img src="{{ asset('app/images/orgup.png') }}" alt="logo" class="logo" width="100">
            <h3>
                Masuk
            </h3>
            <p>Belum punya akun? <a href="">Daftar</a></p>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input placeholder="Email" type="email" id="email" name="email"
                class="@error('email') is-invalid @enderror">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input placeholder="Password" type="password" id="pass" name="password"
                class="@error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" id="button" name="submit">
            Masuk
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-arrow-right">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </button>
    </form>
</x-layouts.auth>
