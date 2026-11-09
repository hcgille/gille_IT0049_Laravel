@extends('layouts.app')
@section('title', 'Edit User')
@section('breadcrumb', 'Edit User')
@section('content')
<a class="back-link" href="{{ route('users.index') }}">@include('components.icon', ['name' => 'arrow-left', 'size' => 17]) Back to users</a>
<div class="form-page-heading"><span class="eyebrow"><span class="mini-spark">✦</span> TEAM DIRECTORY</span><h1 class="page-h1">Make it <em>personal.</em></h1><p class="page-subtitle">Edit {{ $user->full_name }}'s details and upload a profile image.</p></div>
<div class="form-layout"><section class="panel form-panel"><div class="form-panel-head"><div class="form-head-icon">@include('components.icon', ['name' => 'edit', 'size' => 23])</div><div><h3>Edit user information</h3><p>Keep the existing username or choose a new unique one.</p></div></div>@include('users._form', ['isEdit' => true])</section><aside class="form-aside"><span class="aside-icon">@include('components.icon', ['name' => 'image', 'size' => 23])</span><h3>Picture-perfect profiles.</h3><p>Your uploaded image is validated, cropped to a 360 × 360 thumbnail, and stored on the public disk. Only its relative path is saved to the database.</p><div class="aside-rule"></div><span class="aside-caption">TFA7 · AVATAR UPLOAD</span></aside></div>
@endsection
