@extends('layouts.app')

@section('content')
<div class="col-sm-8 blog-main">
        @if(Auth::check())
            <img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}'s Profile</h2>

            @if(Auth::user()->id == $user->id)
            <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="pull-right btn btn-sm btn-primary">
            </form>
            @else
            <h5>This is {{ $user->name }}'s profile picture</h5>
            @endif
        @endif
        </div>
@endsection
