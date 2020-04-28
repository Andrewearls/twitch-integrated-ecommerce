@extends('layouts.admin')

@push('styles')
<link href="{{ URL::asset('admin/css/formable.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('css/cropper.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/modal.css') }}">

@endpush

@section('content')
<form action="{{ route('new-article') }}" method="post" enctype="multipart/form-data">
	@csrf
	<div class="container-fluid">
		<h1 class="mt-4">New Article</h1>
		<ol class="breadcrumb mb-4">
	        <li class="breadcrumb-item active">
	        	<input type="submit" name="submit" id="submitButton">
	        </li>
	    </ol>

	    @if ($errors->any())
	        <div class="alert alert-danger">
	            <ul>
	                @foreach ($errors->all() as $error)
	                    <li>{{ $error }}</li>
	                @endforeach
	            </ul>
	        </div>
	    @endif

		<div class="row">

	      <!-- Post Content Column -->
	      <div class="col-lg-8">

	        <!-- Title -->
	        <h1 class="mt-4 formable" id="article-title">Post Title</h1>
	        <input type="text" name="article-title" class="mt-4 formafied">

	        <!-- Author -->
	        <p class="lead">
	          by
	          <a href="#">Start Bootstrap</a>
	        </p>

	        <hr>

	        <!-- Date/Time -->
	        <p>Posted on January 1, 2019 at 12:00 PM</p>

	        <hr>

	        <!-- Preview Image -->
	        <div class="image-container" >
		        <img class="img-fluid rounded formable-image" src="{{ URL::asset('images/blog-demo.png') }}" alt="" id='article-preview-image'>
		        <input type="file" name="article-preview-image" class="hidden crop-file">
		        <!-- Modal -->
		        <div id="ex1" class="modal">
		        	<div class="cropper-container">
			          	<img class="img-fluid rounded" id="cropper-image" src="{{ URL::asset('images/blog-demo.png') }}">
		          	</div>
		          	<a href="#" rel="modal:close">Close</a>
		        </div>
		        <p class="hidden"><a href="#ex1" rel="modal:open" id="modal-trigger">Open Modal</a></p>
		    </div>

	        <hr>

	        <!-- Post Content -->
	        <textarea class="formafied" name="article-content" rows="23"></textarea>
	        <div class="formable lead" id="article-content">
		        <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p>

		        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

		        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

		        <blockquote class="blockquote">
		          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
		          <footer class="blockquote-footer">Someone famous in
		            <cite title="Source Title">Source Title</cite>
		          </footer>
		        </blockquote>

		        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

		        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui, necessitatibus, est!</p>
		    </div>

	</div>
</form>
@endsection

@push('footer-scripts')
<script type="text/javascript" src="{{ URL::asset('admin/js/formable.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/cropper.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/callCropper.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
@endpush