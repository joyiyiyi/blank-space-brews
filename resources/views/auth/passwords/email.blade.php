@extends('layouts.app')

@section('title', 'Reset Password')

@section('styles')
<style>
    .auth-page { min-height:calc(100vh - 80px); display:flex; align-items:center; justify-content:center; padding:3rem 1.5rem; }
    .auth-card { width:100%; max-width:420px; }
    .auth-eyebrow { font-size:0.7rem; letter-spacing:0.25em; text-transform:uppercase; color:var(--latte); display:block; margin-bottom:0.75rem; }
    .auth-title { font-family:'Cormorant Garamond',serif; font-size:2.5rem; font-weight:300; color:var(--off-white); line-height:1.1; margin-bottom:0.75rem; }
    .auth-sub { color:var(--muted-gray); font-size:0.875rem; line-height:1.6; margin-bottom:2rem; }
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
        <span class="auth-eyebrow">Password Recovery</span>
        <h1 class="auth-title">Reset your<br>password</h1>
        <p class="auth-sub">Enter your email and we'll send you a link to reset your password.</p>

        @if(session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    placeholder="you@example.com"
                    class="form-input @error('email') is-invalid @enderror">
                @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn-primary btn-full">Send Reset Link</button>
        </form>
    </div>
</div>
@endsection