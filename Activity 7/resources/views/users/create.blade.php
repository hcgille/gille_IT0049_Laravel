@extends('layouts.app')
@section('title', 'Create User')
@section('breadcrumb', 'Create User')
@section('content')
<a class="back-link" href="{{ route('users.index') }}">@include('components.icon', ['name' => 'arrow-left', 'size' => 17]) Back to users</a>
<div class="form-page-heading"><span class="eyebrow"><span class="mini-spark">✦</span> TEAM DIRECTORY</span><h1 class="page-h1">A new <em>teammate.</em></h1><p class="page-subtitle">Add a user account to your workspace.</p></div>
<div class="form-layout"><section class="panel form-panel"><div class="form-panel-head"><div class="form-head-icon">@include('components.icon', ['name' => 'users', 'size' => 23])</div><div><h3>User information</h3><p>Fields marked <span class="required">*</span> are required.</p></div></div>@include('users._form', ['isEdit' => false])</section><aside class="form-aside"><span class="aside-icon">@include('components.icon', ['name' => 'shield', 'size' => 23])</span><h3>A unique identity.</h3><p>Each user needs a distinct username and a full name. After creating the account, use Edit to upload an avatar.</p><div class="aside-rule"></div><span class="aside-caption">TFA7 · CREATE USER</span></aside></div>
@endsection
