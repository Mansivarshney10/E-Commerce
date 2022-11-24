<div class="row-12">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/') }}">Mobile Shopping</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ url('product') }}">Shop Now</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link active" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Men</a></li>
                  <li><a class="dropdown-item" href="#">Women</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li> --}}
            </ul>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            @guest
              <a href="{{ url('/registration') }}"><button type="button" class="btn btn-success me-2">Sign Up</button></a>
              <a href="{{ url('/login') }}"><button type="button" class="btn btn-success me-2">Login</button></a>
            @else 
              <a href="{{ url('/user') }}"><p class="text-success me-3 mt-3">{{Auth::user()->name;}}</p></a>
              <a href="{{ url('/logout') }}"><button type="button" class="btn btn-outline-danger me-3">logout</button></a>
            @endif
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> 
          </div>
        </div>
      </nav>
</div>