@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        @include('partials.cards.admin.primary')
        @include('partials.cards.admin.warning')
        @include('partials.cards.admin.success')
        @include('partials.cards.admin.danger')
    </div>
    <div class="row">
        @include('partials.cards.admin.charts.area')
        @include('partials.cards.admin.charts.bar')
    </div>
    @include('partials.cards.admin.tables.primary')
</div>
@endsection