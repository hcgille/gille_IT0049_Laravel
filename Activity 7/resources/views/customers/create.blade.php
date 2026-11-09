@extends('layouts.app')
@section('title', 'Create Customer')
@section('breadcrumb', 'Create Customer')
@section('content')
<a class="back-link" href="{{ route('customers.index') }}">@include('components.icon', ['name' => 'arrow-left', 'size' => 17]) Back to customers</a>
<div class="form-page-heading"><span class="eyebrow"><span class="mini-spark">✦</span> CUSTOMER DIRECTORY</span><h1 class="page-h1">A new <em>connection.</em></h1><p class="page-subtitle">Add a customer account to your database.</p></div>
<div class="form-layout"><section class="panel form-panel"><div class="form-panel-head"><div class="form-head-icon">@include('components.icon', ['name' => 'customers', 'size' => 23])</div><div><h3>Customer information</h3><p>Fields marked <span class="required">*</span> are required.</p></div></div>@include('customers._form', ['isEdit' => false])</section><aside class="form-aside"><span class="aside-icon">@include('components.icon', ['name' => 'shield', 'size' => 23])</span><h3>Clean, accurate records.</h3><p>Names and valid email addresses are required before creating a customer. Laravel checks every submission on the server.</p><div class="aside-rule"></div><span class="aside-caption">TFA7 · CREATE CUSTOMER</span></aside></div>
@endsection
