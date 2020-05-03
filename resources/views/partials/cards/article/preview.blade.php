<!-- Blog Post -->
<div class="card mb-4">
  <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
  <div class="card-body">
    <h2 class="card-title">{{ ucfirst($article->title) }}</h2>
    <p class="card-text">{{ substr($article->content, 0, 200) }}</p>
    <a href="{{ route('article', ['id' => $article->id]) }}" class="btn btn-primary">Read More &rarr;</a>
  </div>
  <div class="card-footer text-muted">
    Posted on {{ date('F j, Y', strtotime($article->created_at)) }} by
    <a href="#">{{ $article->author->name }}</a>
  </div>
</div>