@extends('layout')

@section('title')
Profile
@endsection

@section('content')
@include('partials.errors')
<div class="card">
  <div class="card-header">
    <img src="/pangaea/public/img/logo.png" style="height: 50px; width: 50px; border-radius: 50%;" class="img-responsive">
    <h2>{{$user->name}}</h2>
  </div>
  <div class="card-body">
    <p class="card-text">
    <ul>
      <li>
          Email: {{$user->email}}
      </li>
      <li>
          Location:  {{$user->location}}
      </li>
    </ul>
</p>
  </div>
</div>
@endsection
