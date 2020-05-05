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
<Giphy v-on:image-clicked="imageClicked" />
</div>
@endsection
