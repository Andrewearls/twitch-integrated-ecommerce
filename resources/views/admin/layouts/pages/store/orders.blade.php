@extends('layouts.admin')

@section('content')
	<br>
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card">
				@foreach($orders as $order)
					{{$order}}
				@endforeach
			</div>
		</div>
	</div>
@endsection