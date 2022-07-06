@extends('layouts.adminLayout')
@section('content')
<h2 class="pt-4 ps-5 text-muted">Edit</h2>
<h3 class="pt-2 ps-5 lead fw-bold text-muted">Edit this catalogue.</h1>
<form action={{"catalogueedited/".$catalogue->id}} enctype="multipart/form-data" method="POST" class="w-25 row pt-4 ms-5 border-top border-light border-3">
  
  @csrf
  <div class="col-10">
  <div class="mb-1">
    <input type="hidden" name="id" value= " {{ $catalogue->id }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="id">
  </div>
  <div class="mb-1">
    <label for="catalogue_title" class="form-label">Catalogue Title</label>
    <input type="text" name="catalogue_title" value= " {{$catalogue->catalogue_title}}"class="form-control border border-light border-3" style="background-color:#e4edf5;" id="catalogue_title" >
    @error('catalogue_title')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary mt-3">Edit this catalogue</button></div>
</form>

@stop