<!-- Blog Post -->
<div class="card mb-4">
  <img class="card-img-top" src="data:image/png;base64, {{$article->picture}}" alt="Card image cap">
  <div class="card-body">
    <h2 class="card-title">{{ ucfirst($article->title) }}</h2>
    <p class="card-text">{{ substr($article->content, 0, 200) }}</p>
    <a href="{{ route('article', ['url' => $article->url]) }}" class="btn btn-primary">Read More &rarr;</a>
  </div>
  <div class="card-footer text-muted">
    Posted on {{ date('F j, Y', strtotime($article->created_at)) }} by
    <a href="{{ route('search-author', ['authorURL' => $article->author->url]) }}">{{ $article->author->name }}</a>
  </div>
</div>