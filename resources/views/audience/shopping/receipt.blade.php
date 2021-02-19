@extends('layouts.audience')

@section('content')
<div class="row justify-content-center">
	<div class="col-10 card">
		<div class="card-body">
			<h1>Receipt</h1>
			{{$receipt->user->name}}
			
			{{$receipt}}

			{{$cart->content()}}
		</div>
	</div>
</div>
<!-- // this is your receipt -->
@endsection