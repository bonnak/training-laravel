<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="mr-auto">
      @if(auth()->check())
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user') }}">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('role') }}">Role</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('post') }}">Post</a>
        </li>
      </ul>
      @endif
    </div>
    <ul class="navbar-nav">
      @if(auth()->guest())
      <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>
      @else
      <li class="nav-item">
        <div>{{ auth()->user()->email }}</div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
      </li>
      @endif
    </ul>
  </div>
</nav>