@extends ('layout')

@section('title')
Edit Post
@endsection
@section('content')
@include('partials.errors')

<div id="app">
    <post-edit-form v-model="message" edit-url="{{route('posts.update', $post->id)}}" original-message="{{$post->message}}">
        @csrf
        @method('PATCH')
    </post-edit-form>
    <button class="btn btn-link btn-sm" type="button" data-toggle="collapse" data-target="#collapseGiphy">
        Giphy Search
    </button>
    <div class="collapse giphyButton" id="collapseGiphy">
        <Giphy v-on:image-clicked="imageClicked" />
    </div>
    @endsection