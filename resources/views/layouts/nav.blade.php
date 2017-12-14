<div class="blog-masthead">
  <div class="container">
    <nav class="nav">
      <a class="nav-link active" href="#">Posts</a>
      <a class="nav-link" href="#">Press</a>
      <a class="nav-link" href="#">New hires</a>
      <a class="nav-link " href="#">About</a>

        @guest
          <a class="nav-link ml-auto" href="{{ route('login') }}">
            Login
          </a>
          <a class="nav-link " href="{{ route('register') }}">
            Register
          </a>
        @else
          <a class="nav-link ml-auto" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        @endguest
      </ul>
    </nav>
  </div>
</div>
