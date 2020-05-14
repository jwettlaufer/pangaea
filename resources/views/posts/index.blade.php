@extends('layout')

@section('title')
TravelFeed
@endsection
@section('content')
@if(session()->get('success'))
<div role="alert">
  {{session()->get('success')}}
</div>
@endif
@include('partials.errors')
<!--List of Posts-->
<ul class="post-list" id="app">
  @foreach($posts as $post)
  <li>
    <div class="card post-index">
      <div class="card-header">
        <h2>
          <img src="/pangaea/public/img/logo.png" style="height: 50px; width: 50px; border-radius: 50%;" class="img-responsive">
          <a href="{{route('profile.show', $post->user->id)}}">
            {{$post->name}}
          </a>
        </h2>
      </div>
      <div class="card-body">
        <p class="card-text">
        @if($post->is_gif == TRUE )
        <div>
            <img src="{{ $post->message }}">
        </div>
        @else
        <p>
            {{ $post->message }}
        </p>
        @endif
      </div>
      <div class="card-footer">
        <ul>
          <li>
            <a href="{{route('posts.show', $post->id)}}" class="btn btn-link">
              Read More
            </a>
          </li>
          <li class="pull-right">
            @if (Auth::check())
            <like :post="{{ $post->id }}" :liked="{{ $post->liked() ? 'true' : 'false' }}">
            </like>
            @endif
          <li>
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