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
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#">Web Design</a>
            </li>
            <li>
              <a href="#">HTML</a>
            </li>
            <li>
              <a href="#">Freebies</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-6">
          <ul class="list-unstyled mb-0">
            <li>
              <a href="#">JavaScript</a>
            </li>
            <li>
              <a href="#">CSS</a>
            </li>
            <li>
              <a href="#">Tutorials</a>
            </li>
          </ul>
        </div>
      </div>
    </form>
  </div>
</div>

@push('footer-scripts')
<script type="text/javascript" src="{{ URL::asset('admin/js/message.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('admin/js/forms/categories.js') }}"></script>
@endpush