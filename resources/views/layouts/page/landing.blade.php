@extends('layouts.app')

@section('content')
<div>
	<div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Page Heading
          <small>Secondary Text</small>
        </h1>

        @include('partials.cards.blog.preview')

        @include('partials.cards.blog.preview')
        
        @include('partials.cards.blog.preview')

        @include('partials.paginations.blog.preview')
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        @include('partials.cards.widgets.search')

        @include('partials.cards.widgets.categories')

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
@endsection