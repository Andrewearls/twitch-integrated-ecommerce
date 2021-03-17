<div class="mb-3">
  <label for="address">Address</label>
  <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="{{$type}}[address]" value="{{$address->address ?? ''}}" required="">
  <div class="invalid-feedback">
    Please enter your shipping address.
  </div>
</div>

<div class="mb-3">
  <label for="addressTwo">Address 2 <span class="text-muted">(Optional)</span></label>
  <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" name="{{$type}}[addressTwo]" value="{{$address->address_two ?? ''}}">
</div>

<div class="mb-3">
  <label for="city">City</label>
  <input type="text" class="form-control" id="city" placeholder="Salem" name="{{$type}}[city]" value="{{$address->city ?? ''}}">
</div>

<div class="row">
  <div class="col-md-4 mb-3">
    <label for="state">State</label>
    <select class="custom-select d-block w-100 state-dropdown" name="{{$type}}[state]" required="">
      <option value="">Choose...</option>
      <option disabled>──────────</option>
      @foreach($country->states as $state)
        @isset($address->state)
          <option value="{{$state['name']}}" selected="selected">{{$state['name']}}</ option>
        @else
          <option value="{{$state['name']}}">{{$state['name']}}</option>
        @endisset
      @endforeach
    </select>
    <div class="invalid-feedback">
      Please provide a valid state.
    </div>
  </div>
  <div class="col-md-5 mb-3">
    <label for="country">Country</label>
    <select class="custom-select d-block w-100 country-dropdown" name="{{$type}}[country]" required="">
      <option value="{{$country->cca3}}" selected="selected">{{$country->name->common}}</option>
<!--       <option value="">Choose...</option>
      <option value="USA" selected="selected">United States</option>
 -->    
    </select>
    <div class="invalid-feedback">
      Please select a valid country.
    </div>
  </div>
  <div class="col-md-3 mb-3">
    <label for="zip">Zip</label>
    <input type="text" class="form-control" id="zip" placeholder="" name="{{$type}}[zip]" value="{{$address->zip ?? ''}}"required="">
    <div class="invalid-feedback">
      Zip code required.
    </div>
  </div>
</div>