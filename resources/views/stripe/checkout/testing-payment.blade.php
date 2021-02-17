<h4 class="mb-1">Payment (Testing Mode)</h4>
<h5 class="mb-3">Use the fake card, don't use your real card!</h5>
<div class="row">
  <div class="col-md-6 mb-3">
    <label for="cc-name">Name on card</label>
    <input type="text" class="form-control" id="cc-name" placeholder="" value="Test Card" required="">
    <small class="text-muted">Full name as displayed on card</small>
    <div class="invalid-feedback">
      Name on card is required
    </div>
  </div>
  <!-- <div class="col-md-6 mb-3">
    <label for="cc-number">Credit card number</label>
    <input type="text" class="form-control" id="cc-number" placeholder="" value="4242 4242 4242 4242" required="">
    <div class="invalid-feedback">
      Credit card number is required
    </div>
  </div> -->
</div>

<div class="row">
  <div id="stripe-payment-card" class="col mb-3 ml-3 p-2">
      @include('stripe.update-payment-method')

    <!-- <label for="cc-expiration">Expiration</label>
    <input type="text" class="form-control" id="cc-expiration" placeholder="" value="4/24" required="">
    <div class="invalid-feedback">
      Expiration date required
    </div> -->
  </div>
  <!-- <div class="col-md-3 mb-3">
    <label for="cc-expiration">CVV</label>
    <input type="text" class="form-control" id="cc-cvv" placeholder="" value="242" required="">
    <div class="invalid-feedback">
      Security code required
    </div>
  </div> -->
</div>

<hr class="mb-4">

