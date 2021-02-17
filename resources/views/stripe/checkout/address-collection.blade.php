<div class="mb-3">
  <label for="address">Address</label>
  <input type="text" class="form-control" id="address" placeholder="1234 Main St" value="{{$address->address ?? ''}}" required="">
  <div class="invalid-feedback">
    Please enter your shipping address.
  </div>
</div>

<div class="mb-3">
  <label for="addressTwo">Address 2 <span class="text-muted">(Optional)</span></label>
  <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" value="{{$address->address_two ?? ''}}">
</div>

<div class="row">
  <div class="col-md-5 mb-3">
    <label for="country">Country</label>
    <select class="custom-select d-block w-100" id="country" required="">
      <option value="{{$country->cca3}}" selected="selected">{{$country->name->common}}</option>
<!--       <option value="">Choose...</option>
      <option value="USA" selected="selected">United States</option>
 -->    </select>
    <div class="invalid-feedback">
      Please select a valid country.
    </div>
  </div>
  <div class="col-md-4 mb-3">
    <label for="state">State</label>
    <select class="custom-select d-block w-100" id="state" required="">
      <option value="">Choose...</option>
      <option disabled>──────────</option>
      @foreach($country->states as $state)
        @if ($address->state === $state['name'])
        <option value="{{$state['name']}}" selected="selected">{{$state['name']}}</option>
        @else
        <option value="{{$state['name']}}">{{$state['name']}}</option>
        @endif
      @endforeach
    </select>
    <div class="invalid-feedback">
      Please provide a valid state.
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <label for="zip">Zip</label>
    <input type="text" class="form-control" id="zip" placeholder="" value="{{$address->zip ?? ''}}"required="">
    <div class="invalid-feedback">
      Zip code required.
    </div>
  </div>
</div>