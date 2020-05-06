@extends('layout')

@section('title')
Index
@endsection
@section('content')
@if(session()->get('success'))
<div role="alert">
  {{session()->get('success')}}
</div>
@endif
@include('partials.errors')
<p>List of Posts:</p>
<ul>
  @foreach($posts as $post)
  <li>
    <div class="card">
    <div class="card-header">
    <h2>
      <img src="" style="height: 50px; width: 50px; border-radius: 50%;" class="img-responsive">
      <a href="{{route('profile.show', $post->user->id)}}">
        {{$post->name}}
      </a>
    </h2>
    </div>
    <div class="card-body">
      <p class="card-text">
      @if($post->is_gif == TRUE)
      <img src="{{$post->message}}">
      @else
        {{$post->message}}
      @endif
      </p>
    </div>
      <div id="app">
      <ul>
        <li>
          <like :post={{ $post->id }}></like>
        </li>
        <li>
            <a href="{{route('posts.show', $post->id)}}" class="btn btn-primary">
              Read More
            </a>
        </li>
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
                <input type="submit" value="Delete Post" class="btn btn-warning">
            </form>
        </li>
        @endauth
      </ul>
</div>
    </div>
  </li>
  @endforeach
</ul>
<div class="row">
  <div class="col-12 text-enter">
    {{$posts->links()}}
  </div>
</div>
@endsection
