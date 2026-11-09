@extends('layouts.app')

@section('title', 'About')
@section('breadcrumb', 'About this project')

@section('content')
<div class="page-heading"><div><span class="eyebrow"><span class="mini-spark">✦</span> OUR PROJECT</span><h1 class="page-h1">Built to <em>learn.</em><br>Designed to <em>grow.</em></h1><p class="page-subtitle">One Laravel project, thoughtfully developed across three laboratory activities.</p></div><span class="heading-illustration">@include('components.icon', ['name' => 'sparkles', 'size' => 38])</span></div>

<section class="about-banner"><div><span class="light-kicker">ABOUT TAMARAW POS</span><h2>From a static website<br>to a real account system.</h2><p>Tamaraw POS demonstrates Laravel's MVC architecture, Blade templates, migrations, database-backed Eloquent models, CRUD forms, and display-ready profile images.</p></div><div class="about-banner-stamp" aria-hidden="true">05<span>→</span>07</div></section>

<div class="section-header"><div><span class="section-kicker">THE DEVELOPMENT JOURNEY</span><h3>Three stages. One complete website.</h3></div></div>
<div class="journey-grid">
    <article class="journey-card"><div class="journey-top"><span class="journey-number">01</span><span class="journey-icon">@include('components.icon', ['name' => 'code', 'size' => 23])</span></div><span class="journey-label">TFA 5 · FOUNDATION</span><h3>Structure the application</h3><p>Routes for Home, About, Customers, and Users; PageController, CustomerController, and UserController; Blade loops and navigation. First built with temporary PHP arrays.</p><span class="journey-status">@include('components.icon', ['name' => 'check', 'size' => 16]) Built and evolved</span></article>
    <article class="journey-card"><div class="journey-top"><span class="journey-number">02</span><span class="journey-icon">@include('components.icon', ['name' => 'database', 'size' => 23])</span></div><span class="journey-label">TFA 6 · DATABASE</span><h3>Make records real</h3><p>Customers and Users tables, migrations, two seeders with at least five entries each, and Eloquent models replace static data without changing the familiar page layout.</p><span class="journey-status">@include('components.icon', ['name' => 'check', 'size' => 16]) Built and evolved</span></article>
    <article class="journey-card"><div class="journey-top"><span class="journey-number">03</span><span class="journey-icon">@include('components.icon', ['name' => 'image', 'size' => 23])</span></div><span class="journey-label">TFA 7 · ACCOUNT TOOLS</span><h3>Bring it to life</h3><p>Create and edit both kinds of accounts with validation. Upload images from the user edit page, generate 360 × 360 WebP avatars, and display a placeholder when no image exists.</p><span class="journey-status">@include('components.icon', ['name' => 'check', 'size' => 16]) Implemented</span></article>
</div>

<div class="about-footer-grid"><div class="panel about-meta"><span class="section-kicker">TECHNOLOGY STACK</span><h3>Everything working together.</h3><div class="tech-tags"><span>PHP</span><span>Laravel</span><span>Blade</span><span>MySQL / SQLite</span><span>Eloquent ORM</span><span>Intervention Image v3</span><span>HTML / CSS / JavaScript</span></div></div><div class="panel about-meta"><span class="section-kicker">DESIGN INSPIRATION</span><h3>Rooted in green &amp; gold.</h3><p>Designed using the well-known colors of Far Eastern University, with original project artwork and a modern, responsive interface. This is a learning demonstration, not an official university website.</p><a href="{{ route('home') }}" class="text-link">Return to dashboard @include('components.icon', ['name' => 'arrow-right', 'size' => 16])</a></div></div>
@endsection
