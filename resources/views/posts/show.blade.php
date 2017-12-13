@extends('layouts.app')

@section('content')
  <div class="col-sm-8 blog-main">
    <h1>{{ $post->title }}</h1>
    {{ $post->body }}
    <hr>


    <div class="comments">
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <strong>
                    {{ $comment->created_at->diffForHumans() }}: &nbsp;
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
        </div>
    </div>

  </div><!-- /.blog-main -->
@endsection
