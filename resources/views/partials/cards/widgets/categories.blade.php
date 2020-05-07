<!-- Categories Widget -->
<div class="card my-4">
  <h5 class="card-header">Categories</h5>
  <div class="card-body">
    <div class="row">
      @foreach ($categoryList as $category)
      <div class="col-lg-4">
        <ul class="list-unstyled mb-0">
          <li>
            <a href="{{ route('search-category', ['categoryTitle' => $category->title]) }}">
              {{ $category->title }}
            </a>
          </li>
        </ul>
      </div>
      @endforeach
    </div>
  </div>
</div>

