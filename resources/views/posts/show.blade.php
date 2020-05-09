@extends ('layout')
@section('title')
Read More
@endsection
@section('content')
@include('partials.errors')
<div class="card">
  <div class="card-header">
    <h2><a href="{{route('profile.show', $post->user->id)}}">{{$postUser->name}}</a></h2>
  </div>
  <div class="card-body">
    <p class="card-text">
      @if($post->is_gif == TRUE)
      <img src="{{$post->message}}">
      @else
      {{$post->message}}
      @endif
      <ul>
        @auth
        <li>
          <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary">
            Edit Post
          </a>
        </li>
        <li>
          <form action="{{route('posts.destroy', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete Post" class="btn btn-danger">
          </form>
        </li>
        @endauth
      </ul>
    </p>
  </div>
  <div class="card-body">
    <div class="card-header">
      <h4>Comments</h4>
      @include('partials.comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
    </div>
    <div id="app">
      <comment-create-form comment-url="{{route('comment.add')}}" post-id="{{ $post->id }}" v-model="body">
        @csrf
      </comment-create-form>
      <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseGiphy">
        Giphy
      </button>
      <div class="collapse" id="collapseGiphy">
        <Giphy v-on:image-clicked="imageClicked" />
      </div>
    </div>
  </div>
  <!--
<form method="post" action="{{ route('comment.add') }}">
  @csrf
  <div class="form-group">
    <input type="text" name="comment_body" class="form-control" />
    <input type="hidden" name="post_id" value="{{ $post->id }}" />
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-warning" value="Add Comment" />
  </div>
</form>
-->
  @endsection