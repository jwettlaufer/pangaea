@extends('layout')

@section('title')
Create Post
@endsection
@section('content')
@include('partials.errors')

<div id="app">
    <post-create-form v-model="message" submission-url="{{route('posts.store')}}">
        @csrf
    </post-create-form>
    <button class="btn btn-link btn-sm" type="button" data-toggle="collapse" data-target="#collapseGiphy">
        Giphy Search
    </button>
    <div class="collapse giphyButton" id="collapseGiphy">
        <Giphy v-on:image-clicked="imageClicked" />
    </div>
    @endsection