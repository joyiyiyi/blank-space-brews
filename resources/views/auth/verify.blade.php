@extends('layouts.app')

@section('title', 'Verify Email')

@section('styles')
<style>
    .verify-page {
        min-height: calc(100vh - 80px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 3rem 1.5rem;
    }
    .verify-card {
        width: 100%;
        max-width: 480px;
        text-align: center;
    }
    .verify-icon {
        font-size: 3rem;
        margin-bottom: 1.5rem;
        display: block;
    }
    .verify-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.2rem;
        font-weight: 300;
        color: var(--off-white);
        margin-bottom: 1rem;
    }
    .verify-text {
        color: var(--muted-gray);
        font-size: 0.9rem;
        line-height: 1.7;
        margin-bottom: 2rem;
    }
    .verify-text strong {
        color: var(--latte);
        font-weight: 400;
    }
    .resend-form { margin-top: 1.5rem; }
    .resend-btn {
        background: none;
        border: none;
        color: var(--latte);
        font-family: 'DM Sans', sans-serif;
        font-size: 0.875rem;
        cursor: pointer;
        text-decoration: underline;
        padding: 0;
    }
    .divider-line {
        height: 1px;
        background: var(--border);
        margin: 1.5rem 0;
    }
</style>
@endsection

@section('content')
<div class="verify-page">
    <div class="verify-card">
        <span class="verify-icon">✉</span>
        <h1 class="verify-title">Check your inbox</h1>
        <p class="verify-text">
            We've sent a verification link to your email address.<br>
            Please click the link to <strong>confirm your account</strong> and start brewing.
        </p>

        @if(session('resent'))
            <div class="alert alert-success">A new verification link has been sent.</div>
        @endif

        <div class="divider-line"></div>

        <p style="color:var(--muted-gray); font-size:0.85rem;">
            Didn't receive the email?
        </p>
        <form class="resend-form" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="resend-btn">Resend verification email</button>
        </form>
    </div>
</div>
@endsection