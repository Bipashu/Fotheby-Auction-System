@extends('layouts.adminLayout')
@section('content')
@php
$now = new DateTime();
       
$date =$now->modify('+1 day');
$date1=$date->format('Y-m-d');
@endphp
<h2 class="pt-4 ps-5 text-muted">Create</h2>
<h3 class="pt-2 ps-5 lead fw-bold text-muted">Create a new auction.</h1>
<form action="auctionCreated" enctype="multipart/form-data" method="POST" class="h-75 w-25 pt-4 ms-5 border-top border-light border-3">
  @if(Session::has('success'))
  <div class="alert alert-success">{{Session::get('success')}}</div>
  <a href="auctionsModel" class="text-decoration-none">Return to auctions model.</a>
  @endif
  @if(Session::has('fail'))
  <div class="alert alert-fail">{{Session::get('fail')}}</div>
  <a href="auctionsModel" class="text-decoration-none">Return to auctions model.</a>
  @endif
  @csrf
  
  <div class="mb-1">
    <label for="auction_title" class="form-label">Auction Title</label>
    <input type="text" name="auction_title" value= " {{old ('auction_title') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="auction_title">
    @error('auction_title')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="auction_date" class="form-label">Auction Date</label>
    <input type="date" name="auction_date" value= " {{old ('auction_date') }} "  min="{{$date1}}" max="2022-12-01" class="form-control border border-light border-3" style="background-color:#e4edf5;" id="auction_date">
    @error('auction_date')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  
    <button type="submit" class="btn btn-primary mt-3">Add a new auction.</button>
</form>

@stop