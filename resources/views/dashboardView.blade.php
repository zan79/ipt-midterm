@extends('base')

@include('navbar')

@section('content')

<div class="row">

  <div class="col-md-3">
    <div class="card bs br my-3">
      <div class="card-body">

        @if (auth()->user()->gender == 'Male')
        <h1 class="card-title text-center img-icon">👦</h1>
        @else
        <h1 class="card-title text-center img-icon">👧</h1>
        @endif
        <hr>
        <h1 class="text-center fw-bold">{{auth()->user()->name}}</h1>

      </div>
    </div>
  </div>

  <div class="col-md-6">

    <div class="card bs br my-3">
      <div class="card-body pb-2">
  
        <form action="{{url('/newpost')}}" method="post">
          {{csrf_field()}}
  
          @if (auth()->user()->gender == 'Male')
          <h3>👦 {{auth()->user()->name}}</h3>
          @else
          <h3>👧 {{auth()->user()->name}}</h3>
          @endif
  
          <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
          <div class="mb-2">
            <textarea name="post" id="post" cols="30" rows="3" class="form-control bs" style="background-color: lightyellow;" placeholder="Got something on your mind?"></textarea>
          </div>
  
          <button class="btn btn-primary bs float-end" type="submit" style="width: 100px">Post</button>
          <div class="float-end mx-2">
            <select name="category_id" id="category_id" class="form-select">
              @foreach(App\Models\Category::all() as $c)
              <option value="{{$c->id}}">{{$c->category}}</option>
              @endforeach
            </select>
          </div>
          <h5 class="float-end mt-2">Category</h5>
        </form>
  
      </div>
    </div>
  
    <div class="card bs br my-3 pt-2" style="background-color: lightgreen;">
      <h4 class="ms-3 text-center">Recent Posts</h4>
    </div>
  
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

    <div class="col-md-3">
      <div class="card bs br my-3">
        <div class="card-body">
  
          <h3 class="card-title text-center fw-bold">
            Cheap Talk is available on following countries.
          </h3>
          <hr>
          <ul>
            <li><a href="https://sea.lib.niu.edu/philippines/links">Philippines</a></li>
            <li><a href="https://sea.lib.niu.edu/singapore/links">Singapore</a></li>
            <li><a href="https://sea.lib.niu.edu/thailand/links">Thailand</a></li>
            <li><a href="https://sea.lib.niu.edu/indonesia/links">Indonesia</a></li>
            <li><a href="https://sea.lib.niu.edu/vietnam/links">Vietnam</a></li>
            <li><a href="https://sea.lib.niu.edu/malaysia/links">Malaysia</a></li>
            <li><a href="https://sea.lib.niu.edu/brunei/links">Brunei</a></li>
            <li><a href="https://sea.lib.niu.edu/burma/links">Burma (Myanmar)</a></li>
            <li><a href="https://sea.lib.niu.edu/cambodia/links">Cambodia</a></li>
            <li><a href="https://sea.lib.niu.edu/easttimor/links">Timor-Leste</a></li>
            <li><a href="https://sea.lib.niu.edu/laos/links">Laos</a></li>
          </ul>
        </div>
      </div>
    </div>

</div>

@endsection