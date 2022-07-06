@extends('layouts.adminLayout')
@section('content')
<h2 class="pt-4 ps-5 text-muted">Create</h2>
<h3 class="pt-2 ps-5 lead fw-bold text-muted">Create a new catalogue.</h1>
<form action="catalogueCreated" enctype="multipart/form-data" method="POST" class="h-75 w-25 pt-4 ms-5 border-top border-light border-3">
  
  @csrf
  
  <div class="mb-1">
    <label for="catalogue_title" class="form-label">Catalogue Title</label>
    <input type="text" name="catalogue_title" value= " {{old ('catalogue_title') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="catalogue_title">
    @error('catalogue_title')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="lot_number" class="form-label">Catalogue Lot Number</label>
    <input type="text" name="lot_number" value= " {{old ('catalogue_lot_number') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="lot_number">
    @error('lot_number')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary mt-3">Add a new catalogue.</button>
</form>

@stop