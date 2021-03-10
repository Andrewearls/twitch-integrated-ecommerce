
<div class="row">
  <div class="col-md-6 mb-3">
    <label for="firstName">First name</label>
    <input type="text" class="form-control" id="firstName" placeholder="" name="firstName" value="{{auth()->user()->firstName ?? ''}}" required="">
    <div class="invalid-feedback">
      Valid first name is required.
    </div>
  </div>
  <div class="col-md-6 mb-3">
    <label for="lastName">Last name</label>
    <input type="text" class="form-control" id="lastName" placeholder="" name="lastName" value="{{auth()->user()->lastName ?? ''}}" required="">
    <div class="invalid-feedback">
      Valid last name is required.
    </div>
  </div>
</div>

<!-- <div class="mb-3">
  <label for="username">Username</label>
  <div class="input-group">
    <div class="input-group-prepend">
      <span class="input-group-text">@</span>
    </div>
    <input type="text" class="form-control" id="username" placeholder="Username" required="">
    <div class="invalid-feedback" style="width: 100%;">
      Your username is required.
    </div>
  </div>
</div> -->

<div class="mb-3">
  <label for="email">Email</label>
  <input type="email" class="form-control" id="email" placeholder="you@example.com" name="email" value="{{auth()->user()->email ?? ''}}">
  <div class="invalid-feedback">
    Please enter a valid email address for shipping updates.
  </div>
</div>

@include('stripe.checkout.address-collection', ['type' => 'billing'])