@extends('base')

@section('navbar')
  <nav class="navbar navbar-expand-lg navbar-light fixed-top bs bg-light">
    <div class="container">
      <a class="navbar-brand fw-bold" href="{{ url('/') }}">Midterm App</a>
      <form class="d-flex">
        <ul class="navbar-nav">
          <a class="btn btn-primary" href="{{ url('/login') }}">Login</a>
        </ul>
      </form>
    </div>
  </nav>
@endsection

@section('content')

  <div class="container d-flex align-items-center justify-content-center" style="height: 100vh">
    <div class="col text-center">
      <h1 class="text-danger" style="font-size: 5rem;">IPT 102 Midterm</h1>
      <h3>Midterm Project for IPT 102</h3>
      <a class="btn btn-success mt-2" href="{{ url('/register') }}">Get Started</a>
    </div>
  </div>

@endsection