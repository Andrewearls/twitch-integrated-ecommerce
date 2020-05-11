@extends('layouts.admin')

@push('styles')
<link href="{{ URL::asset('admin/css/formable.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('admin/css/main.css') }}" rel="stylesheet" />
@endpush

@section('content')
<form action="{{ route('twitch') }}" method="post">
	@csrf
	<div class="container-fluid">
		<h1 class="mt-4">Twitch</h1>
		<ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active">
	        	<input type="submit" name="submit" id="submitButton">
	        </li>
	    </ol>

	    @if ($errors->any())
	        <div class="alert alert-danger">
	            <ul>
	                @foreach ($errors->all() as $error)
	                    <li>{{ $error }}</li>
	                @endforeach
	            </ul>
	        </div>
	    @endif

		<div class="row">

	      <!-- Post Content Column -->
	      <div class="col-lg-8">

	        <!-- Title -->
	        <h1 class="mt-4 formable" id="article-title">Name of the Channel</h1>
	        <input type="text" name="article-title" class="mt-4 formafied">

	        <hr>

			<input type="checkbox" name="display">
	        <label class="mt-4 formable" id="article-title">Display on Front Page</label>
	        

		</div>

	</div>
</form>
@endsection

@push('footer-scripts')
<script type="text/javascript" src="{{ URL::asset('admin/js/formable.js') }}"></script>
@endpush