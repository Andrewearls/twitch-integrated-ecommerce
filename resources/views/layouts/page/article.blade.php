@extends('layouts.app')

@section('content')
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4">{{ ucfirst($article->title) }}</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="{{ route('search-author', ['authorURL' => $article->author->url]) }}">
            {{ $article->author->name}}
          </a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p> Posted on {{ date('F j, Y', strtotime($article->created_at)) }}</p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

        <hr>

        <!-- Post Content -->
        <!-- <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?</p> -->

        <p>{{ $article->content }}</p>

       <!--  <blockquote class="blockquote">
          <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
          <footer class="blockquote-footer">Someone famous in
            <cite title="Source Title">Source Title</cite>
          </footer>
        </blockquote> -->

        <hr>

        <!-- comments to come soon!
        include('partials.cards.article.forms.comments')

        include('partials.comment')

        include('partials.comment') -->

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
<!--    Search to come soon!
        include('partials.cards.widgets.search')
 -->
        @include('partials.cards.widgets.categories')

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
@endsection