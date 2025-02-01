@extends('layouts.CSSlogin')

@section('content')
<div class="login-container">
    <div class="login-card">
        <h2 class="login-header">Selamat Datang!</h2>

        <!-- Session Status -->
        @if (session('status'))
            <div class="alert alert-success mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="form-group">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input id="email" type="email" name="email" class="form-input" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">{{ __('Kata sandi') }}</label>
                <input id="password" type="password" name="password" class="form-input" required>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Login Button -->
            <div class="form-group">
                <button type="submit" class="login-button">
                    {{ __('Masuk') }}
                </button>
            </div>
        </form>

        <!-- Footer -->
        <div class="login-footer">
            <p>
                {{ __("Tidak mempunyai akun?") }}
                <a href="{{ route('register') }}" class="register-link">{{ __('Mendaftar') }}</a>
            </p>
        </div>
    </div>
</div>
@endsection