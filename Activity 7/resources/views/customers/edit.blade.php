@extends('layouts.app')
@section('title', 'Edit Customer')
@section('breadcrumb', 'Edit Customer')
@section('content')
<a class="back-link" href="{{ route('customers.index') }}">@include('components.icon', ['name' => 'arrow-left', 'size' => 17]) Back to customers</a>
<div class="form-page-heading"><span class="eyebrow"><span class="mini-spark">✦</span> CUSTOMER DIRECTORY</span><h1 class="page-h1">Update <em>details.</em></h1><p class="page-subtitle">Editing the record for {{ $customer->full_name }}.</p></div>
<div class="form-layout"><section class="panel form-panel"><div class="form-panel-head"><div class="form-head-icon">@include('components.icon', ['name' => 'edit', 'size' => 23])</div><div><h3>Edit customer information</h3><p>Existing values are already filled in for you.</p></div></div>@include('customers._form', ['isEdit' => true])</section><aside class="form-aside"><span class="aside-icon">@include('components.icon', ['name' => 'shield', 'size' => 23])</span><h3>Your changes matter.</h3><p>Update the information, then save. The changes will be written to the customer's Eloquent record in the database.</p><div class="aside-rule"></div><span class="aside-caption">TFA7 · EDIT CUSTOMER</span></aside></div>
@endsection
