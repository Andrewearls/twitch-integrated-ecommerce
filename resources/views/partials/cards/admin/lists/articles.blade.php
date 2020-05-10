@extends('layouts.admin')

@section('content')
<div>
	<div class="container">

    <div class="row">

      <!-- Article Entries Column -->
      <div class="col-md-8">

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