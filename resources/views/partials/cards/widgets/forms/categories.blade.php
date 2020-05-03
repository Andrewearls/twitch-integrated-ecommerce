<!-- Categories Widget -->
<div class="card my-4" id="categories-card">
  <h5 class="card-header">Categories</h5>
  <div class="card-body">
    <form action="{{ route('new-category') }}" method="post" id="categories-form">
      @csrf
      <div class="row">
        <div class="col-lg-12">
          <input type="text" name="newCategory" class="" id="new-category">
          <button id="category-button" href="{{route('new-category')}}" class="hidden"></button>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          @foreach($categoryList as $category)
            <button type="button">{{$category->title}}</button>
          @endforeach
        </div>
      </div>
    </form>
  </div>
</div>

@push('footer-scripts')
<script type="text/javascript" src="{{ URL::asset('admin/js/message.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/js/forms/categories.js') }}"></script>
@endpush