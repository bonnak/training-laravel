<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <div class="mr-auto">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user') }}">User</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('role') }}">Role</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ route('post') }}">Post</a>
        </li>
      </ul>
    </div>
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('login') }}">Login</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
      </li>
    </ul>
  </div>
</nav>