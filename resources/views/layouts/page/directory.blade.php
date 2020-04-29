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

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
@endsection