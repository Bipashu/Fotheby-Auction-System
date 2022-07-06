@extends('layouts.publicLayout')

@section('content')
<h2 class="pt-4 ps-5 text-muted">Register</h2>
<h3 class="pt-2 ps-5 lead fw-bold text-muted">Create a new account.</h1>

<form action="userRegistered" method="POST" class="h-90 w-25 pt-4 ms-5 border-top border-light border-3">
  @if(Session::has('success'))
  <div class="alert alert-success">{{Session::get('success')}}</div>
  @endif
  @if(Session::has('fail'))
  <div class="alert alert-fail">{{Session::get('fail')}}</div>
  @endif
  @csrf
  <div class="mb-1">
    <label for="name" class="form-label">Name</label>
    <input type="text" name="name" value= " {{old ('name') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="name">
    @error('name')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="telephone_no" class="form-label">Telephone No</label>
    <input type="text" name="telephone_no" value= " {{old ('telephone_no') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="telephone_no">
    @error('telephone_no')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" value= " {{old ('address') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="address">
    @error('address')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="bank_account_no" class="form-label">Back Account No</label>
    <input type="text" name="bank_account_no" value= " {{old ('bank_account_no') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="bank_account_no">
    @error('bank_account_no')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="email" class="form-label">Email address</label>
    <input type="email" name="email" value= " {{old ('email') }} " class="form-control border border-light border-3" style="background-color:#e4edf5;"id="email" aria-describedby="emailHelp">
    @error('email')
    <div class="alert-danger">{{$message}}</div>
    @enderror
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-1">
    <label for="password0" class="form-label">Password</label>
    <input type="password" name="password0" class="form-control border border-light border-3" style="background-color:#e4edf5;"id="password0">
    @error('password0')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="password" class="form-label">Confirm Password</label>
    <input type="password" name="password" class="form-control border border-light border-3" style="background-color:#e4edf5;"id="password">
    @error('password')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-1">
     <label for="user_type" class="form-label">What do you want to register as?</label>
     <select class="form-select form-select-lg mb-3" aria-label=".form-select example" style="background-color:#e4edf5;" name="user_type" id="user_type">
     <option selected value="Buyer">Buyer</option>
     <option value="Seller">Seller</option>
    
     </select>
     @error('user_type')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>

  <button type="submit" class="btn btn-primary btn-sm">REGISTER</button>
</form>
@stop