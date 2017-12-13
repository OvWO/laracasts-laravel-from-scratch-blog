<div class="blog-masthead">
  <div class="container">
    <nav class="nav">
      <a class="nav-link active" href="{{ route('home') }}">Home</a>
      <a class="nav-link" href="{{ redirect('/posts') }}">Posts</a>
      <a class="nav-link" href="#">Press</a>
      <a class="nav-link" href="#">New hires</a>
      <a class="nav-link" href="#">About</a>

          <ul class="nav justify-content-end">
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
              Login
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">
              Register
            </a>
          </li>
        @else

          <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              Logout
          </a></li>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        @endguest
      </ul>
    </nav>

  </div>
</div>
