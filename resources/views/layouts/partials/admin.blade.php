<nav>
    <div class="row d-flex justify-content-around">
        <div class="card">
            <div class="card-header bgcolor text-black">
              Admin users
            </div>
            <div class="card-body">

              <p class="card-text">Delete or modify user's role.</p>
              <a href="{{route('users.index')}}" class="btn btn-primary">Admin</a>
            </div>
          </div>
    </div>
    <div class="row d-flex justify-content-around mt-3">
        <div class="card">
            <div class="card-header bgcolor text-black">
              Admin posts
            </div>
            <div class="card-body">

              <p class="card-text">Delete user's posts</p>
              <a href="{{route('posts-admin')}}" class="btn btn-primary">Admin</a>
            </div>
          </div>
    </div>
    <div class="row d-flex justify-content-around mt-3">
        <div class="card">
            <div class="card-header bgcolor text-black">
              Admin tags
            </div>
            <div class="card-body">

              <p class="card-text">Create or Delete Tags</p>
              <a href="{{route('tags-admin')}}" class="btn btn-primary">Admin</a>
            </div>
          </div>
    </div>
</nav>
