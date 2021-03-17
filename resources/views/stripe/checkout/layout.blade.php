@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row justify-content-center no-gutters">
	<div class="col-12 col-md-6">
		<div class="card">
			<body class="bg-light" style="">

			    <div class="container">
			      	<div class="py-5 text-center">
			        	<img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
			        	<h2>Checkout form</h2>
			        </div>

			      	<div class="row">
			        	@include('stripe.checkout.cart')
		        		<div class="col-md-8 order-md-1">
		        	  		@yield('form')
			        	</div>
			     	</div>
			    </div>
		    </body>
	    </div>
    </div>
</div>			  
@endsection

@push('footer-scripts')
@endpush