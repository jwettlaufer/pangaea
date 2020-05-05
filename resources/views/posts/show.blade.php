@extends ('layout')
@section('title')
Show Post
@endsection
@section('content')
@include('partials.errors')

<h2><a href="{{route('profile.show', $post->user->id)}}">{{$postUser->name}}</a></h2>
<p>
@if($post->is_gif == TRUE)
  <img src="{{$post->message}}">
@else
  {{$post->message}}
@endif
</p>
<h4>Display Comments</h4>
@include('partials.comment_replies', ['comments' => $post->comments, 'post_id' => $post->id])
<h4>Add comment</h4>
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
@endsection
