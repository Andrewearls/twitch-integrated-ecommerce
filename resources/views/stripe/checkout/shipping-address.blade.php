<h4 class="mb-3">Shipping address</h4>
<div class="custom-control custom-checkbox mb-3">
  <input type="checkbox" class="custom-control-input" id="same-address" name="shipping[same]">
  <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
</div>

<div id="shipping-address" class="">
	@include('stripe.checkout.address-collection', ['type' => 'shipping'])
</div>

@push('footer-scripts')
<script>
$(document).ready(function(){
	$('#same-address').change(function () {
		$('#shipping-address').toggle('hidden');
	});
});
</script>
@endpush

