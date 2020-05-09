@extends ('layout')

@section('title')
Edit Comment
@endsection
@section('content')
@include('partials.errors')

<div id="app">
  <comment-edit-form v-model="body" edit-url="{{route('comment.update', $comment->id)}}" original-message="{{$comment->body}}">
    @csrf
    @method('PATCH')
  </comment-edit-form>
  <Giphy v-on:image-clicked="imageClicked" />
</div>
@endsection