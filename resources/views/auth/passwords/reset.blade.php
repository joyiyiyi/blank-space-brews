@extends('layouts.app')

@section('title', 'Set New Password')

@section('styles')
<style>
    .auth-page { min-height:calc(100vh - 80px); display:flex; align-items:center; justify-content:center; padding:3rem 1.5rem; }
    .auth-card { width:100%; max-width:420px; }
    .auth-eyebrow { font-size:0.7rem; letter-spacing:0.25em; text-transform:uppercase; color:var(--latte); display:block; margin-bottom:0.75rem; }
    .auth-title { font-family:'Cormorant Garamond',serif; font-size:2.5rem; font-weight:300; color:var(--off-white); line-height:1.1; margin-bottom:2rem; }
    .form-group { margin-bottom:1.25rem; }
    .form-label { display:block; font-size:0.7rem; letter-spacing:0.15em; text-transform:uppercase; color:var(--muted-gray); margin-bottom:0.5rem; }
    .form-input { width:100%; background:#1C1C1C; border:1px solid #2A2A2A; color:var(--off-white); padding:0.85rem 1rem; font-family:'DM Sans',sans-serif; font-size:0.9rem; font-weight:300; outline:none; transition:border-color 0.2s; }
    .form-input:focus { border-color:var(--latte); }
    .form-input.is-invalid { border-color:#DC5050; }
    .invalid-feedback { color:#DC5050; font-size:0.8rem; margin-top:0.35rem; display:block; }
    .btn-full { width:100%; padding:0.9rem; font-size:0.8rem; }
</style>
@endsection

@section('content')
<div class="auth-page">
    <div class="auth-card">
        <span class="auth-eyebrow">New Password</span>
        <h1 class="auth-title">Set a new<br>password</h1>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ $email ?? old('email') }}" required autofocus
                    class="form-input @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password">New Password</label>
                <input id="password" type="password" name="password" required autocomplete="new-password"
                    placeholder="Min. 8 characters"
                    class="form-input @error('password') is-invalid @enderror">
                @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password-confirm">Confirm New Password</label>
                <input id="password-confirm" type="password" name="password_confirmation" required
                    placeholder="Repeat password"
                    class="form-input">
            </div>

            <button type="submit" class="btn-primary btn-full">Update Password</button>
        </form>
    </div>
</div>
@endsection