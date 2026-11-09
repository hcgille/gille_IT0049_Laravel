@extends('layouts.app')

@section('title', 'Dashboard')
@section('breadcrumb', 'Overview')

@section('content')
<div class="welcome-row"><div><span class="eyebrow"><span class="mini-spark">✦</span> THE TAMARAW WORKSPACE</span><h1 class="page-h1">Good day, <em>tamaraw.</em></h1><p class="page-subtitle">Your customer and user accounts, all in one place.</p></div><span class="date-badge">@include('components.icon', ['name' => 'calendar', 'size' => 17]) {{ now()->format('l, F j, Y') }}</span></div>

<section class="hero" aria-label="Welcome to Tamaraw POS">
    <div class="hero-content">
        <div class="hero-chip"><span class="hero-chip-dot"></span> LARAVEL · ACTIVITY 07</div>
        <h2>Manage smarter.<br><span>Grow together.</span></h2>
        <p>A modern account management workspace built with Laravel, powered by a real database, and inspired by the spirit of green and gold.</p>
        <div class="hero-actions"><a class="btn btn-gold" href="{{ route('customers.create') }}">@include('components.icon', ['name' => 'plus', 'size' => 18]) Add a customer</a><a class="hero-secondary" href="{{ route('about') }}">Explore the project @include('components.icon', ['name' => 'arrow-right', 'size' => 17])</a></div>
    </div>
    <div class="hero-art" aria-hidden="true"><div class="hero-ring ring-1"></div><div class="hero-ring ring-2"></div><div class="hero-ring ring-3"></div><div class="hero-crest"><span>TP</span><small>GREEN & GOLD</small></div><div class="hero-art-label"><span class="gold-spark">✦</span> EST. AS A LEARNING PROJECT</div></div>
</section>

<div class="stats-grid">
    <a href="{{ route('customers.index') }}" class="stat-card"><div class="stat-top"><span class="stat-icon stat-icon-green">@include('components.icon', ['name' => 'customers', 'size' => 22])</span><span class="stat-arrow">@include('components.icon', ['name' => 'arrow-up-right'])</span></div><div class="stat-number">{{ number_format($customerCount) }}</div><div class="stat-bottom"><strong>Total customers</strong><span>Records in database</span></div></a>
    <a href="{{ route('users.index') }}" class="stat-card"><div class="stat-top"><span class="stat-icon stat-icon-gold">@include('components.icon', ['name' => 'users', 'size' => 22])</span><span class="stat-arrow">@include('components.icon', ['name' => 'arrow-up-right'])</span></div><div class="stat-number">{{ number_format($userCount) }}</div><div class="stat-bottom"><strong>Registered users</strong><span>Records in database</span></div></a>
    <div class="stat-card stat-card-feature"><div class="stat-top"><span class="stat-icon stat-icon-mint">@include('components.icon', ['name' => 'layers', 'size' => 22])</span><span class="small-tag">ALL STAGES</span></div><div class="stat-number">03<span class="stat-unit"> / 03</span></div><div class="stat-bottom"><strong>Laboratory activities</strong><span>TFA5 · TFA6 · TFA7</span></div></div>
</div>

<div class="dashboard-grid">
    <section class="panel panel-list"><div class="panel-header"><div><span class="section-kicker">CUSTOMER DIRECTORY</span><h3>Recent customers</h3></div><a href="{{ route('customers.index') }}" class="text-link">View all @include('components.icon', ['name' => 'arrow-right', 'size' => 16])</a></div><div class="mini-list">
        @forelse($recentCustomers as $customer)
            <div class="mini-person"><div class="person-initials">{{ strtoupper(mb_substr($customer->full_name, 0, 1)) }}</div><div class="mini-person-info"><strong>{{ $customer->full_name }}</strong><span>{{ $customer->email }}</span></div><a class="mini-edit" href="{{ route('customers.edit', $customer) }}" aria-label="Edit {{ $customer->full_name }}">@include('components.icon', ['name' => 'arrow-up-right', 'size' => 18])</a></div>
        @empty
            <div class="mini-empty">No customers yet. <a href="{{ route('customers.create') }}">Add the first one</a>.</div>
        @endforelse
    </div></section>
    <section class="panel panel-list"><div class="panel-header"><div><span class="section-kicker">TEAM DIRECTORY</span><h3>Recent users</h3></div><a href="{{ route('users.index') }}" class="text-link">View all @include('components.icon', ['name' => 'arrow-right', 'size' => 16])</a></div><div class="mini-list">
        @forelse($recentUsers as $user)
            <div class="mini-person"><img class="person-photo" src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/avatar-placeholder.svg') }}" alt="" width="42" height="42"><div class="mini-person-info"><strong>{{ $user->full_name }}</strong><span>@@{{ $user->username }}</span></div><a class="mini-edit" href="{{ route('users.edit', $user) }}" aria-label="Edit {{ $user->full_name }}">@include('components.icon', ['name' => 'arrow-up-right', 'size' => 18])</a></div>
        @empty
            <div class="mini-empty">No users yet. <a href="{{ route('users.create') }}">Add the first one</a>.</div>
        @endforelse
    </div></section>
</div>
<div class="bottom-note">@include('components.icon', ['name' => 'shield', 'size' => 18]) <span>Built with Laravel Blade, Eloquent ORM, validated forms, and safe thumbnail handling. This is a class project and not an official FEU system.</span></div>
@endsection
