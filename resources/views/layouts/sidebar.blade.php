<aside class="col-sm-3 ml-sm-auto blog-sidebar">
  <div class="sidebar-module sidebar-module-inset">
    <h4>About</h4>
    <p>This is a site that I did following <a href="https://laracasts.com/series/laravel-from-scratch-2017">Laracast's tutorial.</a></em> I also added some other features as described in the <a href="{{ route('note') }}">Note Page</a>  to keep improving my skills. You can also check the source code in <a href="">Github.</a></p>
  </div>
  <div class="sidebar-module">
    <h4>Archives</h4>
    <ol class="list-unstyled">
      @foreach($archives as $stats)
        <li>
          <a href="/posts/?month={{ $stats['month'] }}&year={{ $stats['year'] }}">{{ $stats['month'] . ' ' . $stats['year'] }}</a>
        </li>
      @endforeach
    </ol>
  </div>
  <div class="sidebar-module">
    <h4>Tags</h4>
    <ol class="list-unstyled">
      @foreach($tags as $tag)
        <li>
          <a href="/posts/tags/{{ $tag }}">{{ $tag }}</a>
        </li>
      @endforeach
    </ol>
  </div>
  <div class="sidebar-module">
    <h4>Elsewhere</h4>
    <ol class="list-unstyled">
      <li><a href="#">GitHub</a></li>
      <li><a href="#">Twitter</a></li>
      <li><a href="#">Facebook</a></li>
    </ol>
  </div>
</aside><!-- /.blog-sidebar -->
