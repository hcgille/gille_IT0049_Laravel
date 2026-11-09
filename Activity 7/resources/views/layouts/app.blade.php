<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#075437">
    <meta name="description" content="Tamaraw POS, a green-and-gold Laravel student project for customer and user account management.">
    <title>@yield('title', 'Dashboard') | Tamaraw POS</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <link rel="stylesheet" href="{{ asset('css/tamaraw-pos.css') }}">
    <script defer src="{{ asset('js/tamaraw-pos.js') }}"></script>
</head>
<body>
<div class="app-shell">
    <aside class="sidebar" id="site-sidebar" aria-label="Main navigation">
        <div class="sidebar-top">
            <a class="brand" href="{{ route('home') }}" aria-label="Tamaraw POS home">
                <img src="{{ asset('images/tamaraw-mark.svg') }}" width="45" height="45" alt="" class="brand-symbol">
                <span class="brand-copy"><strong>TAMARAW<span class="brand-accent">POS</span></strong><small>ACCOUNT MANAGEMENT</small></span>
            </a>
            <div class="sidebar-section-title">WORKSPACE</div>
            <nav class="nav-list" aria-label="Main pages">
                <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}" @if(request()->routeIs('home')) aria-current="page" @endif>@include('components.icon', ['name' => 'home']) <span>Overview</span></a>
                <a class="nav-link {{ request()->routeIs('customers.*') ? 'active' : '' }}" href="{{ route('customers.index') }}" @if(request()->routeIs('customers.*')) aria-current="page" @endif>@include('components.icon', ['name' => 'customers']) <span>Customer Accounts</span></a>
                <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}" @if(request()->routeIs('users.*')) aria-current="page" @endif>@include('components.icon', ['name' => 'users']) <span>User Accounts</span></a>
                <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif>@include('components.icon', ['name' => 'about']) <span>About This Project</span></a>
            </nav>
            <div class="sidebar-section-title quick-title">QUICK ACTIONS</div>
            <nav class="nav-list" aria-label="Quick actions">
                <a class="nav-link nav-link-subtle" href="{{ route('customers.create') }}">@include('components.icon', ['name' => 'plus']) <span>New customer</span></a>
                <a class="nav-link nav-link-subtle" href="{{ route('users.create') }}">@include('components.icon', ['name' => 'plus']) <span>New user</span></a>
            </nav>
        </div>
        <div class="sidebar-bottom">
            <div class="side-progress">
                <span class="small-kicker">LABORATORY PROGRESS</span>
                <div class="progress-top"><strong>TFA 5 → 7</strong><span>Complete</span></div>
                <div class="progress-track"><span></span></div>
                <p>Routes · Eloquent · Forms · Avatars</p>
            </div>
            <div class="side-credit"><span class="gold-star">✦</span> FEU-inspired student project</div>
        </div>
    </aside>
    <div class="mobile-overlay" data-close-sidebar></div>

    <div class="page-column">
        <header class="topbar">
            <div class="topbar-left">
                <button class="mobile-menu" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="site-sidebar" data-open-sidebar>@include('components.icon', ['name' => 'menu'])</button>
                <span class="breadcrumbs"><span class="breadcrumb-muted">Workspace</span><span class="slash">/</span><strong>@yield('breadcrumb', 'Overview')</strong></span>
            </div>
            <div class="topbar-right">
                <span class="topbar-status"><span class="live-dot"></span> Local workspace</span>
                <div class="topbar-avatar" aria-hidden="true">TP</div>
            </div>
        </header>

        <main class="main-content" id="main-content">
            @if(session('success'))
                <div class="alert alert-success" role="status">@include('components.icon', ['name' => 'check-circle']) <span>{{ session('success') }}</span><button type="button" aria-label="Dismiss notification" data-dismiss-alert>@include('components.icon', ['name' => 'x', 'size' => 17])</button></div>
            @endif
            @yield('content')
        </main>
        <footer class="footer"><span>© {{ date('Y') }} Tamaraw POS · Laravel Laboratory Project</span><span>Built with <strong>green &amp; gold</strong> · TFA5 / TFA6 / TFA7</span></footer>
    </div>
</div>
</body>
</html>
