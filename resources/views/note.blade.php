@extends('layouts.app')

@section('content')
<div class="col-sm-8 blog-main">
<div class="blog-post">
  <h2 class="blog-post-title">
    List of Extra Features
  </h2>
  <p class="blog-post-meta">Pull Requests are welcome!</p>
{{--   Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat laborum numquam facere officia quidem, asperiores, culpa a cupiditate dignissimos possimus ullam assumenda architecto omnis tempora minima earum, quis similique quasi. --}}
  <h3>Done</h3>
  <ul>
      <li>Verify Registration Email</li>
      <li>Added a profile and user Image</li>
      <li>Extra blade directives to manage who can see what</li>
  </ul>
  <h3>Undone</h3>
  <ul>
      <li>Pagination that works with bootstrap template</li>
      <li>Add comments with Vuejs as in this <a href="https://github.com/DevMarketer/Laravel_Echo_Tutorial">Github repo</a></li>
      <li>Facebook and Google login with Socialite Laravel Package</li>
  </ul>
</div><!-- /.blog-post -->

</div><!-- /.blog-main -->
@endsection
