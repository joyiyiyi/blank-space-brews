@extends('layouts.app')

@section('title', 'Register')

@section('styles')
<style>
    /* copy semua style dari auth/login.blade.php bagian <style> */
    .auth-page {
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 1.5rem;
    }
    .auth-card { width: 100%; max-width: 420px; }
    .auth-header { margin-bottom: 2.5rem; }
    .auth-eyebrow { font-size:0.7rem; letter-spacing:0.25em; text-transform:uppercase; color:var(--latte); display:block; margin-bottom:0.75rem; }
    .auth-title { font-family:'Cormorant Garamond',serif; font-size:2.5rem; font-weight:300; color:var(--off-white); line-height:1.1; }
    .form-group { margin-bottom:1.25rem; }
    .form-label { display:block; font-size:0.7rem; letter-spacing:0.15em; text-transform:uppercase; color:var(--muted-gray); margin-bottom:0.5rem; }
    .form-input { width:100%; background:var(--surface); border:1px solid var(--border); color:var(--off-white); padding:0.85rem 1rem; font-family:'DM Sans',sans-serif; font-size:0.9rem; font-weight:300; outline:none; transition:border-color 0.2s; }
    .form-input::placeholder { color:var(--border); }
    .form-input:focus { border-color:var(--latte); }
    .form-input.is-invalid { border-color:#DC5050; }
    .invalid-feedback { color:#DC5050; font-size:0.8rem; margin-top:0.35rem; display:block; }
    .btn-full { width:100%; padding:0.9rem; font-size:0.8rem; margin-bottom:1.25rem; }
    .auth-footer { text-align:center; font-size:0.825rem; color:var(--muted-gray); }
    .auth-footer a { color:var(--latte); text-decoration:none; }
    .auth-footer a:hover { text-decoration:underline; }
    .form-divider { height:1px; background:var(--border); margin:1.5rem 0; }
    .password-hint { font-size:0.75rem; color:var(--muted-gray); margin-top:0.35rem; }
</style>
@endsection

@section('content')
<div class="auth-page">
    <div class="auth-card">
        <div class="auth-header">
            <span class="auth-eyebrow">New here?</span>
            <h1 class="auth-title">Join the<br>community</h1>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="name">Full Name</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    placeholder="Your name"
                    class="form-input @error('name') is-invalid @enderror">
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    placeholder="you@example.com"
                    class="form-input @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    placeholder="Min. 8 characters"
                    class="form-input @error('password') is-invalid @enderror">
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                <span class="password-hint">At least 8 characters</span>
            </div>

            <div class="form-group">
                <label class="form-label" for="password-confirm">Confirm Password</label>
                <input id="password-confirm" type="password" name="password_confirmation" required
                    placeholder="Repeat password"
                    class="form-input">
            </div>

            <button type="submit" class="btn-primary btn-full">Create Account</button>

            <div class="form-divider"></div>

            <div class="auth-footer">
                Already have an account? <a href="{{ route('login') }}">Sign in</a>
            </div>
        </form>
    </div>
</div>
@endsection