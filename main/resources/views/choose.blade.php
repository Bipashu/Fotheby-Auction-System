@extends('layouts.sellerLayout')
@section('content')
<h2 class="pt-4 ps-5 text-muted">Create</h2>
<h3 class="pt-2 ps-5 lead fw-bold text-muted">Create a new item.</h1>
<form action="createItem" enctype="multipart/form-data" method="POST" class="h-75 w-25 pt-4 ms-5 border-top border-light border-3">
  
  @csrf
  <div class="mb-1">
     <label for="category_name" class="form-label">Choose a Category</label>
     <select class="form-select form-select-lg mb-3" aria-label=".form-select example" style="background-color:#e4edf5;" name="category_name" id="category_name">
     <option selected value="Drawings">Drawings</option>
     <option value="Paintings">Paintings</option>
     <option value="Photographic Images">Photographic Images</option>
     <option value="Sculptures">Sculptures</option>
     <option value="Carvings">Carvings</option>
     </select>
     @error('category_name')
        <div class="alert-danger">{{$message}}</div>
     @enderror
  </div>
      <button type="submit" class="btn btn-primary mt-3">Choose.</button>
</form>

@stop