@extends('layouts.admin')

@section('content')
<div>
	<div class="container">

    <div class="row">

      <!-- Article Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">My Articles
          <small></small>
        </h1>

        <!-- List of Articles -->
        @foreach ($articleList as $article)
          @include('partials.cards.article.preview', ['article' => $article])
        @endforeach

        @include('partials.paginations.article.preview')
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
@endsection