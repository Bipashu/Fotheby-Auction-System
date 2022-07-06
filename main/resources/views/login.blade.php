@extends('layouts.publicLayout')
@section('content')
<h2 class="pt-4 ps-5 text-muted">Log in</h2>
<h3 class="pt-2 ps-5 lead fw-bold text-muted">Use a local account to log in.</h1>

<form action="loggedIn" method="POST" class="h-75 w-25 pt-4 ms-5 border-top border-light border-3">
  @if(Session::has('fail'))
  <div class="alert alert-fail">{{Session::get('fail')}}</div>
  @endif
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="emailaddress"class="form-control border border-light border-3" style="background-color:#e4edf5;"id="exampleInputEmail1" aria-describedby="emailHelp">
    @error('emailaddress')
    <div class="alert-danger">{{$message}}</div>
    @enderror
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control border border-light border-3" style="background-color:#e4edf5;"id="exampleInputPassword1">
    @error('password')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember me?</label>
  </div>
  <button type="submit" class="btn btn-primary">LOG IN</button>
 <a href="register" class="d-block mt-3 text-decoration-none"> Register as a new user</a>
</form>
@stop