<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <title>Root</title>
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('bootstrap/css/style.css') }}">
    <script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <div class=" container collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="col-6 navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Main</a>
              </li>
              <li class="nav-item offset-3">
                <a class="nav-link active" aria-current="page" href="{{ route('post.create') }}">Create post</a>
              </li>
            </ul>
            <form class="d-flex" role="search" action="{{ route('post.index') }}">
              <input class="form-control me-2" name="search" type="search" placeholder="Find a post" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>
<div class="container">
    @if (session('success'))
      <div class="alert alert-success" role="alert">
        {{ session('success') }}
      </div>
    @endif
    @yield('content')
</div>
</body>
</html>
