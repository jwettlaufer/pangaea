@extends ('layout')
@section('title')
Read More
@endsection
@section('content')
@include('partials.errors')
<div class="card post-show">
  <div class="card-header">
    <h2><a href="{{route('profile.show', $post->user->id)}}">{{$postUser->name}}</a></h2>
  </div>
  <div id="app">
    <div class="card-body">
      <p class="card-text">
        @if($post->is_gif == TRUE)
        <img src="{{$post->message}}">
        @else
        {{$post->message}}
        @endif
      </p>
    </div>
    <div class="card-footer">
      <ul>
        @auth
        <li>
          <a href="{{route('posts.edit', $post->id)}}" class="btn btn-primary btn-sm">
            Edit Post
          </a>
        </li>
        <li>
          <form action="{{route('posts.destroy', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete Post" class="btn btn-danger btn-sm">
          </form>
        </li>
        @endauth
        <li class="pull-right">
          @if (Auth::check())
          <like :post={{ $post->id }} :liked={{ $post->liked() ? 'true' : 'false' }}>
          </like>
          @endif
          <span>{{ $post->likes()->count() }}</span>
        </li>
      </ul>
    </div>
    <hr>
    <!--comments-->
    <div class="card-header">
      <h4>Comments</h4>
    </div>
    <div class="card-body">
      @include('partials.comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
    </div>
    <div class="card-footer">
      <comment-create-form comment-url="{{route('comment.add')}}" post-id="{{ $post->id }}" v-model="body">
        @csrf
      </comment-create-form>
      <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseGiphy">
        Giphy Search
      </button>
      <div class="collapse" id="collapseGiphy">
        <Giphy v-on:image-clicked="imageClicked" />
      </div>
    </div>
  </div>
</div>
@endsection