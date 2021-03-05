@extends('layouts.admin')

@section('content')
	<br>
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card">
				<div class="card-header">
					Edit
				</div>
				<div class="card-body">
					<form action="{{ route('store-update')}}" method="POST">
						@csrf
						@if(empty($store->stripe_user_id))
							@can('manage stripe account')
								<a class="btn" href="{{route('stripe-account-create')}}">Set Up Stripe</a>
								<!-- <a class="btn" href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id=ca_HZNXxqGZGzIfEeHAne2q8wgvZ7vMW3IZ&scope=read_only">Set up Stripe</a> -->
							@endcan
							@cannot('manage stripe account')
								Stripe Not Connected
							@endcannot
						@elseif($store->stripe_account_status === App\StripeAccountStatus::PENDING)
							@can('manage stripe account')
								<a class="btn" href="{{route('stripe-account-pending')}}">Finish Setting Up</a>
							@endcan
							@cannot('manage stripe account')
								Stripe Account Pending
							@endcannot
						@else
							Stripe Connected
						@endif
						<!-- <button type="submit" value="save">Save</button> -->
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection