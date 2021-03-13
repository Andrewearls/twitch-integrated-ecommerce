<!-- <input id="card-holder-name" type="text"> -->

<!-- Stripe Elements Placeholder -->
<div id="card-element"></div>

<!-- <button id="card-button">
    Process Payment
</button>
	 -->
@push('footer-scripts')
	<script src="https://js.stripe.com/v3/"></script>

	<script>
		window.onload = function () {
		    const stripe = Stripe("{{ env('STRIPE_KEY') }}");

		    const elements = stripe.elements();
		    const cardElement = elements.create('card', {
		    	style: {
		    	    base: {
		    	      	iconColor: '#495057',
		    	      	color: '#495057',
		    	      	fontWeight: '500',
		    	      	fontFamily: 'Roboto, Open Sans, Segoe UI, sans-serif',
		    	      	fontSize: '16px',
		    	      	fontSmoothing: 'antialiased',
		    	      	':-webkit-autofill': {
		    	        	color: '#495057',
		    	      	},
		    	      	'::placeholder': {
		    	        	color: '#495057',
		    	      	},
		    	    },
		    	    invalid: {
		    	      	iconColor: '#FFC7EE',
		    	      	color: '#FFC7EE',
		    	    },	
		    	},
		    });

		    cardElement.mount('#card-element');
	    
		    const cardHolderName = document.getElementById('card-holder-name');
		    const cardButton = document.getElementById('card-button');

		    cardButton.addEventListener('click', async (e) => {
		        const { paymentMethod, error } = await stripe.createPaymentMethod(
		            'card', cardElement, {
		                billing_details: { name: cardHolderName.value }
		            }
		        );

		        if (error) {
		            // Display "error.message" to the user...
		            alert(error.message);
		        } else {
		            // The card has been verified successfully...
		            //send paymentMethod.id to server for processing
		            var formData = $('#form').serializeArray().reduce(function(obj, item) {
					    obj[item.name] = item.value;
					    return obj;
					}, {});
					$.post("{{ route('stripe-checkout') }}", { _token: "{{csrf_token() }}", paymentMethod: paymentMethod.id, formData })
					.done(function (response){
						// alert(response);
						if(response !== "false") {
							window.location.replace(response);
						} else {
							alert("something went wrong");
						}
					});
		        }
		    });
		};
	</script>
@endpush