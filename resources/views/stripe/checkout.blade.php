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
		        	  		<h4 class="mb-3">Billing address</h4>
		        	  		<form class="needs-validation" novalidate="" action="{{route('submit-address')}}" method="post">
		        	  			@csrf
			        			@include('stripe.checkout.billing-address', ['address' => $billingAddress ?? ''])
			        			<hr class="mb-4">
			        			@include('stripe.checkout.shipping-address', ['address' => $shippingAddress ?? ''])

			            		<hr class="mb-4">
			            
			            		<button class="btn btn-primary btn-lg btn-block mb-3" id="card-button" type="submit">Continue to checkout</button>
			          		</form>
			        	</div>
			     	</div>
			    </div>
		    </body>
	    </div>
    </div>
</div>			  
@endsection

@push('footer-scripts')
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->

<!-- <script>
  // Example starter JavaScript for disabling form submissions if there are invalid fields
  (function() {
    'use strict';

    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');

      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script> -->
@endpush