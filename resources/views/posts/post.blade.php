<div class="blog-post">
  <h2 class="blog-post-title">
    <a href="/posts/{{ $post->id }}">
      {{ $post->title }}
    </a>
  </h2>
  <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }} by <a href="#">{{ $post->user->name}} <img src="/uploads/avatars/{{ $post->user->avatar }}" style="width:32px; height:32px; position:static; top:10px; left:10px; border-radius:50%">
</a></p>

  {{ $post->body }}
</div><!-- /.blog-post -->
<img src="{{ $post->user->avatar }}" alt="">
