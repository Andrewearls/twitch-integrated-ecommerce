@extends('layouts.admin')

@section('content')
<form>
	@csrf
	<input type="text" name="title">
	<input type="submit" name="submit">
</form>
@endsection