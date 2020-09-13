@extends('layouts.admin')

@section('content')
	<br>
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card">
				<div class="card-header">
					Edit/New store
				</div>
				<div class="card-body">
					<form action="{{ route('store-update', ['id' => $store->id]) }}" method="POST">
						@csrf
						<input type="text" name="name" placeholder="name">
						<input type="text" name="slug" placeholder="slug">
						<button type="submit" value="save">Save</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection