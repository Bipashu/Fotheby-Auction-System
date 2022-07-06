@extends('layouts.adminLayout')
@section('content')
<h2 class="pt-4 ps-5 text-muted">Edit</h2>
<h3 class="pt-2 ps-5 lead fw-bold text-muted">Edit this auction.</h1>
<form action={{"/auctionedited/".$auction->id}} enctype="multipart/form-data" method="POST" class="w-25 row pt-4 ms-5 border-top border-light border-3">
  
  @csrf
  <div class="col-10">
  <div class="mb-1">
    <input type="hidden" name="id" value= " {{ $auction->id }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="id">
  </div>
  <div class="mb-1">
    <label for="auction_title" class="form-label">Auction Title</label>
    <input type="text" name="auction_title" value= " {{$auction->auction_title}}"class="form-control border border-light border-3" style="background-color:#e4edf5;" id="auction_title" >
    @error('auction_title')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary mt-3">Edit this auction</button></div>
</form>

@stop