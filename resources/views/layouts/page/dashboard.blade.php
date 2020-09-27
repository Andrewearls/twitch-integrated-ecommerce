@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    //This is where content for the user will be presented
    @if(isset($messages))
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    @endif

    @if(isset($alerts))
        <div class="row">
            @include('partials.cards.admin.primary')
            @include('partials.cards.admin.warning')
            @include('partials.cards.admin.success')
            @include('partials.cards.admin.danger')
        </div>
    @endif

    @if(isset($charts))
        <div class="row">
            @include('partials.cards.admin.charts.area')
            @include('partials.cards.admin.charts.bar')
        </div>
    @endif

    @if(isset($tables))
        @include('partials.cards.admin.tables.primary')
    @endif

</div>
@endsection

@push('footer-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ URL::asset('admin/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ URL::asset('admin/js/demo/chart-bar-demo.js') }}"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="{{ URL::asset('admin/js/demo/datatables-demo.js') }}"></script>
@endpush