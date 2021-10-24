@extends('base')

@include('navbar')

@section('content')

<div class="col-md-6 mx-auto">

  <div class="card bs br my-3 pt-2 bg-primary">
    <h1 class="ms-3 text-center text-light">Users</h1>
  </div>

  <hr>
  @foreach($users as $user)
  @if ($user->gender == 'Male')
  <div class="card my-3 bs br" style="background-color: lightblue">
  @else
  <div class="card my-3 bs br" style="background-color: lightpink">
  @endif
    <div class="card-body pb-1">
      <a class="btn btn-lg btn-light float-end bs br" href="/user/{{$user->id}}">Show Posts</a>
      @if ($user->gender == 'Male')
      <h1 class="card-title">👦 {{$user->name}}</h1>
      @else
      <h1 class="card-title">👧 {{$user->name}}</h1>
      @endif
    </div>
  </div>
  @endforeach
  
</div>
    
@endsection

