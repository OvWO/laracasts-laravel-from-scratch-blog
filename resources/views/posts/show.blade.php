@extends('layouts.app')

@section('content')
  <div class="col-sm-8 blog-main">
    <h1>{{ $post->title }}</h1>

    @if(count($post->tags))
        <ul class="list-unstyled">
            @foreach($post->tags as $tag)
                <li>
                    <a href="/posts/tags/{{ $tag->name }}" class="badge badge-secondary">
                        {{ $tag->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
    {{ $post->body }}
    <hr>
    @if(Auth::check() and Auth::user()->id == $post->user_id)
         <a href="/posts/{{ $post->id }}/edit" class="btn btn-primary">Edit</a>
         <hr>
    @endif

    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <strong>
                    <p>{{ $comment->created_at->diffForHumans() }} &nbsp;<a href="/profile/{{ $comment->user_id }}">by {{ $comment->user->name }} <img src="/uploads/avatars/{{ $comment->user->avatar }}" style="width:32px; height:32px; position:static; top:10px; left:10px; border-radius:50%"></a></p>
                </strong>
                <li class="list-group-item">
                    {{ $comment->body }}
                </li>
            @endforeach
        </ul>
    </div>
    <hr>
    <div class="card">
        <div class="card-block">
            @if(Auth::check())
            <form method="POST" action="/posts/{{ $post->id }}/comments">
                {{ csrf_field() }}
                <div class="form-group">
                    <textarea type="text" name="body" id="body" class="form-control" placeholder="Your comment here" required=""></textarea>

                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary" required>Add Comment</button>
                </div>
                @include('partials.errors')
            </form>
            @else
                <div class="form-group">
                    <h5>You must <a href="{{ route('login') }}">login</a> to post a comment</h5>
                </div>
            @endif
        </div>
    </div>
  </div><!-- /.blog-main -->
@endsection
