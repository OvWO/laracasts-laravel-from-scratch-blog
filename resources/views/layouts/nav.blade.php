<div class="blog-masthead">
  <div class="container">
    <nav class="nav">
      <a class="nav-link active" href="#">Posts</a>
      <a class="nav-link" href="#">Press</a>


        @guest
          <a class="nav-link ml-auto" href="{{ route('login') }}">
            Login
          </a>
          <a class="nav-link " href="{{ route('register') }}">
            Register
          </a>
        @else

        <a class="nav-link dropdown-toggle ml-auto" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:static; top:10px; left:10px; border-radius:50%">
              {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ url('/profile') }}"><i class="fa fa-btn fa-user"></i>Profile</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </div>


        @endguest
    </nav>
  </div>
</div>
{{--
<img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                                {{ Auth::user()->name }} <span class="caret"></span>
 --}}



