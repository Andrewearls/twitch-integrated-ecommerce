@extends('layouts.app')

@section('content')
<div>
	<div class="container">

    <div class="row">

      @if(isset($twithc->display) && !$twitch->display == 0)
        @include('partials.twitch', ['twitch' => $twitch])
      @endif

      <!-- Article Entries Column -->
      <div class="col-md-8">  
        
        <h1 class="my-4">{{$pageHeading}}
          <small>{{$secondaryHeading}}</small>
        </h1>
        <!-- List of Articles -->
        @foreach ($articleList as $article)
          @include('partials.cards.article.preview', ['article' => $article])
        @endforeach

        @include('partials.paginations.article.preview')
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
<!--    Search comming soon!
        include('partials.cards.widgets.search')
 -->
        @include('partials.cards.widgets.categories')

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
@endsection