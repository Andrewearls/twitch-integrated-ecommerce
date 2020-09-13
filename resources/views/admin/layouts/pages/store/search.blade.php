@extends('layouts.admin')

@section('content')
	<br>
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card">
				<div class="card-header">
					List of your stores
				</div>
				<div class="card-body">
					@if(!$stores->isEmpty())
						true
						@foreach($stores as $store)
							{{ $store }}
						@endforeach
					@else
						@include('admin.partials.cards.store.new')
					@endif
				</div>
			</div>
		</div>
	</div>
@endsection