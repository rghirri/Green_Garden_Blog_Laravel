<div class="col-md-4 col-xl-3 my-5">
  <div class="sidebar px-4 py-md-0">

    <h6 class="sidebar-title">Search</h6>
    <form class="input-group input-group-sm" action="" method="GET">
      <input type="text" class="form-control" name="search" placeholder="Search"
        value="{{ request()->query('search') }}">
      <div class="input-group-addon">
        <span class="input-group-text"><i style="font-size:17px" class="fas fa-search"></i></span>
      </div>
    </form>

    <hr>

    <h6 class="sidebar-title">Categories</h6>
    <div class="row link-color-default fs-14 lh-24">
      @foreach($categories as $category)
      <div class="col-6 text-capitalize"><a href="{{ route('blog.category', $category->id) }}">
          {{ $category->name }}
        </a>
      </div>
      @endforeach
    </div>

    <hr>

    <h6>Tags</h6>
    <div class="row link-color-default fs-14 lh-24">
      @foreach($tags as $tag)
      <div class="col-6 text-capitalize"><a href="{{ route('blog.tag', $tag->id) }}">
          {{ $tag->name }}
        </a>
      </div>
      @endforeach
    </div>

  </div>
</div>