<input id="card-holder-name" type="text">

<!-- Stripe Elements Placeholder -->
<div id="card-element"></div>

<button id="card-button">
    Process Payment
</button>
	
@push('footer-scripts')
	<script src="https://js.stripe.com/v3/"></script>

	<script>
		window.onload = function () {
		    const stripe = Stripe("{{ env('STRIPE_KEY') }}");

		    const elements = stripe.elements();
		    const cardElement = elements.create('card');

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
		            alert(error);
		        } else {
		            // The card has been verified successfully...
		            //send paymentMethod.id to server for processing
					$.post("{{ route('stripe-checkout') }}", { _token: "{{csrf_token() }}", paymentMethod: paymentMethod.id })
					.done(function (response){
						alert(response);
						if(response == "success") {
							// reroute
						} else {
							alert("something went wrong");
						}
					});
		        }
		    });
		};
	</script>
@endpush