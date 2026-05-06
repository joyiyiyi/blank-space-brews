@extends('layouts.app')

@section('title', 'Welcome')

@section('styles')
<style>
    .hero {
        min-height: 90vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 5rem 1.5rem;
        position: relative;
    }

    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(ellipse 60% 50% at 50% 60%, rgba(227,194,159,0.06), transparent 70%);
    }

    .hero-content {
        max-width: 700px;
        margin: auto;
    }

    .hero-eyebrow {
        font-size: 0.75rem;
        letter-spacing: 0.3em;
        text-transform: uppercase;
        color: var(--latte);
        margin-bottom: 1.2rem;
    }

    .hero-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: clamp(3rem, 7vw, 5.5rem);
        font-weight: 400;
        line-height: 1.1;
        margin-bottom: 1.2rem;
    }

    .hero-title em {
        color: var(--latte);
        font-style: italic;
    }

    .hero-sub {
        color: var(--muted-gray);
        font-size: 0.95rem;
        max-width: 480px;
        margin: 0 auto 2rem;
        line-height: 1.6;
    }

    .hero-actions {
        display: flex;
        gap: 1rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .divider {
        width: 1px;
        height: 50px;
        background: linear-gradient(to bottom, transparent, var(--latte), transparent);
        margin: 3rem auto;
    }

    .features {
        padding: 3rem 1.5rem 5rem;
        max-width: 1100px;
        margin: auto;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 1rem;
    }

    .feature-card {
        background: var(--onyx);
        padding: 2rem;
        border: 1px solid var(--border);
        border-radius: 12px;
        transition: all 0.25s ease;
    }

    .feature-card:hover {
        background: var(--surface);
        transform: translateY(-4px);
    }

    .feature-icon {
        font-size: 1.2rem;
        margin-bottom: 1rem;
        display: block;
    }

    .feature-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 1.3rem;
        margin-bottom: 0.5rem;
    }

    .feature-desc {
        color: var(--muted-gray);
        font-size: 0.9rem;
        line-height: 1.6;
    }
</style>
@endsection

@section('content')
<section class="hero">
    <div class="hero-content">
        <span class="hero-eyebrow">Est. 2026 · Yogyakarta</span>

        <h1 class="hero-title">
            Where silence<br>meets <em>great coffee</em>
        </h1>

        <p class="hero-sub">
            A sanctuary for the thoughtful. Every cup crafted with intention, every space designed for clarity.
        </p>

        <div class="hero-actions">
            @auth
                <a href="{{ route('home') }}" class="btn-primary">Go to Dashboard</a>
            @else
                <a href="{{ route('register') }}" class="btn-primary">Create Account</a>
                <a href="{{ route('login') }}" class="btn-ghost">Sign In</a>
            @endauth
        </div>
    </div>
</section>

<div class="divider"></div>

<section class="features">
    <div class="features-grid">
        <div class="feature-card">
            <span class="feature-icon">☕ Single Origin Brews</span>
            <p class="feature-desc">Sourced from small farms across Indonesia and East Africa. Every bean tells a story worth tasting.</p>
        </div>
        <div class="feature-card">
            <span class="feature-icon">◻ Minimal Spaces</span>
            <p class="feature-desc">Designed for deep work and quiet conversation. No clutter, no noise — just you and your thoughts.</p>
        </div>
        <div class="feature-card">
            <span class="feature-icon">🎁 Member Benefits</span>
            <p class="feature-desc">Join our community for early access to seasonal menus, events, and exclusive brewing workshops.</p>
        </div>
    </div>
</section>
@endsection