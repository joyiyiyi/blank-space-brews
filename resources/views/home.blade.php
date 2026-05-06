@extends('layouts.app')

@section('title', 'Dashboard')

@section('styles')
<style>
    .dashboard {
        max-width: 900px;
        margin: 0 auto;
        padding: 4rem 2rem;
    }
    .dash-eyebrow {
        font-size: 0.7rem;
        letter-spacing: 0.25em;
        text-transform: uppercase;
        color: var(--latte);
        display: block;
        margin-bottom: 0.75rem;
    }
    .dash-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 3rem;
        font-weight: 300;
        color: var(--off-white);
        margin-bottom: 0.5rem;
    }
    .dash-sub {
        color: var(--muted-gray);
        font-size: 0.9rem;
        margin-bottom: 3rem;
    }
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1px;
        background: var(--border);
        border: 1px solid var(--border);
        margin-bottom: 3rem;
    }
    .stat-card {
        background: var(--surface);
        padding: 2rem;
    }
    .stat-value {
        font-family: 'Cormorant Garamond', serif;
        font-size: 2.5rem;
        font-weight: 300;
        color: var(--latte);
        display: block;
    }
    .stat-label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        color: var(--muted-gray);
        margin-top: 0.25rem;
    }
    .info-card {
        background: var(--surface);
        border: 1px solid var(--border);
        padding: 2rem;
    }
    .info-card h3 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.25rem;
        font-weight: 400;
        color: var(--off-white);
        margin-bottom: 1rem;
    }
    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 0.75rem 0;
        border-bottom: 1px solid var(--border);
        font-size: 0.875rem;
    }
    .info-row:last-child { border-bottom: none; }
    .info-key { color: var(--muted-gray); }
    .info-val { color: var(--off-white); }
    .badge-verified {
        background: rgba(227,194,159,0.12);
        color: var(--latte);
        font-size: 0.7rem;
        padding: 0.2rem 0.6rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }
</style>
@endsection

@section('content')
<div class="dashboard">
    <span class="dash-eyebrow">Member Dashboard</span>
    <h1 class="dash-title">Welcome back,<br>{{ Auth::user()->name }}</h1>
    <p class="dash-sub">Your space is ready. Pull up a chair.</p>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="stats-grid">
        <div class="stat-card">
            <span class="stat-value">🪪</span>
            <span class="stat-label">Active Membership</span>
        </div>
        <div class="stat-card">
            <span class="stat-value">☕</span>
            <span class="stat-label">Your Brew Awaits</span>
        </div>
        <div class="stat-card">
            <span class="stat-value">∞</span>
            <span class="stat-label">Refills Available</span>
        </div>
    </div>

    <div class="info-card">
        <h3>Account Details</h3>
        <div class="info-row">
            <span class="info-key">Name</span>
            <span class="info-val">{{ Auth::user()->name }}</span>
        </div>
        <div class="info-row">
            <span class="info-key">Email</span>
            <span class="info-val">{{ Auth::user()->email }}</span>
        </div>
        <div class="info-row">
            <span class="info-key">Member Since</span>
            <span class="info-val">{{ Auth::user()->created_at->format('F j, Y') }}</span>
        </div>
        <div class="info-row">
            <span class="info-key">Email Status</span>
            <span class="info-val">
                @if(Auth::user()->email_verified_at)
                    <span class="badge-verified">Verified</span>
                @else
                    <span style="color:#DC5050; font-size:0.8rem;">Not Verified</span>
                @endif
            </span>
        </div>
        <div class="info-row">
            <span class="info-key">Password</span>
            <span class="info-val" style="color:var(--muted-gray); font-size:0.8rem;">Stored securely as bcrypt hash</span>
        </div>
    </div>
</div>
@endsection