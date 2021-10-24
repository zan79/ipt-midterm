@extends('base')

@include('navbar')

@section('content')

<div class="card col-md-10 mx-auto bs br my-3 pt-2 bg-primary">
  <h1 class="card-title ms-3 text-light text-center">{{$user->name}}'s Posts</h1>
</div>

<div class="row">

  <div class="col-md-4 offset-1">
    <div class="card bs br my-3">
      <div class="card-body">

        @if ($user->gender == 'Male')
        <h1 class="card-title text-center img-icon">👦</h1>
        @else
        <h1 class="card-title text-center img-icon">👧</h1>
        @endif
        <h1 class="text-center fw-bold">{{$user->name}}</h1>
        <hr>

        <h5>📧 {{$user->email}}</h5>

        @if (auth()->user()->gender == 'Male')
        <h5>🚹 {{$user->gender}}</h5>
        @else
        <h5>🚺 {{$user->gender}}</h5>
        @endif

      </div>
    </div>
  </div>
  

  <div class="col-md-6 ">
    @foreach($posts as $post)
    @if ($post->user->gender == 'Male')
    <div class="card my-3 bs br" style="background-color: lightblue">
      @else
      <div class="card my-3 bs br" style="background-color: lightpink">
        @endif
        <div class="card-body p-1">
          <div class="dropdown float-end">
  
            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              📚{{$post->category->category}}
            </button>
  
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              @foreach(App\Models\User::whereHas('posts', function($query) use ($post){
              $query->where('category_id', $post->category_id);
              })->get() as $user)
              <li>
                @if ($user->gender == 'Male')
                <a class="dropdown-item" href="/user/{{$user->id}}">👦 {{$user->name}}</a>
                @else
                <a class="dropdown-item" href="/user/{{$user->id}}">👧 {{$user->name}}</a>
                @endif
              </li>
              @endforeach
            </ul>
  
          </div>
  
          <div class="ms-3 pt-2">
            @if ($post->user->gender == 'Male')
            <h5 class="card-title">👦 {{$post->user->name}}</h5>
            @else
            <h5 class="card-title">👧 {{$post->user->name}}</h5>
            @endif
          </div>
  
          <p class="card-text bg-white py-2 px-3 bs br-down">{{$post->post}}</p>
  
        </div>
      </div>
      @endforeach
    
  </div>
</div>
    
@endsection

