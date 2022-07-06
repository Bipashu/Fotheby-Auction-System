@extends('layouts.sellerLayout')
@section('content')
<h2 class="pt-4 ps-5 text-muted">Create</h2>
<h3 class="pt-2 ps-5 lead fw-bold text-muted">Create a new item.</h1>
<form action="itemCreated" enctype="multipart/form-data" method="POST" class="w-25 pt-4 ms-5 border-top border-light border-3">
  
  @csrf
  <div class="mb-1">
    <label for="category_name" class="form-label">Category Name</label>
    <input type="text" name="category_name" value= " {{$category_name}} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="category_name" readonly>
    @error('category_name')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="item_name" class="form-label">Item Name</label>
    <input type="text" name="item_name" value= " {{old ('item_name') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="item_name">
    @error('item_name')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <!-- <div class="mb-1">
    <label for="lot_reference_no" class="form-label">Lot Reference No </label>
    <input type="text" name="lot_reference_no" value= " {{old ('lot_reference_no') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="lot_reference_no">
    @error('lot_reference_no')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div> -->
  <div class="mb-1">
    <label for="artist_name" class="form-label">Artist Name</label>
    <input type="text" name="artist_name" value= " {{old ('artist_name') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="artist_name">
    @error('artist_name')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="year_of_production" class="form-label">Year of Production</label>
    <input type="text" name="year_of_production" value= " {{old ('year_of_production') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="year_of_production">
    @error('year_of_production')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="description" class="form-label">Description</label>
    <input type="text" name="description" value= " {{old ('description') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="description">
    @error('description')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-1">
    <label for="start_price" class="form-label">Start Price</label>
    <input type="text" name="start_price" value= " {{old ('start_price') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="start_price">
    @error('start_price')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  <div class="mb-1">
     <label for="subject_classification" class="form-label">Subject Classification</label>
     <select class="form-select form-select-lg mb-3" aria-label=".form-select example" style="background-color:#e4edf5;" name="subject_classification" id="subject_classification">
     <option selected value="Landscape">Landscape</option>
     <option value="Seascape">Seascape</option>
     <option value="Potrait">Potrait</option>
     <option value="Figure">Figure</option>
     <option value="Still Life">Still Life</option>
     <option value="Nude">Nude</option>
     <option value="Animal">Animal</option>
     <option value="Abstract">Abstract</option>
     <option value="Other">Other</option>
     </select>
     @error('subject_classification')
        <div class="alert-danger">{{$message}}</div>
     @enderror
  </div>
  <div class="mb-1">
    <label for="picture" class="form-label">Item Picture</label>
    <input type="file" name="picture" value= " {{ old ('picture') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="picture">
  </div>
  @error('picture')
        <div class="alert-danger">{{$message}}</div>
     @enderror
     @if($category_name=='Drawings' || $category_name=='Paintings')
     <div class="mb-1">
     <label for="medium" class="form-label">Medium</label>
     <select class="form-select form-select-lg mb-3" aria-label=".form-select example" style="background-color:#e4edf5;" name="medium" id="medium">
     <option selected value="Pencil">Pencil</option>
     <option selected value="Ink">Ink</option>
     <option selected value="Charcoal">Charcoal</option>
     <option selected value="Oil">Oil</option>
     <option selected value="Acrylic">Acrylic</option>
     <option selected value="Watercolour">Watercolour</option>
     <option value="Other">Other</option>
          </select>
     @error('image_type')
        <div class="alert-danger">{{$message}}</div>
     @enderror
  </div>
  <div class="mb-1">
    <label for="dimension" class="form-label">Dimension</label>
    <div class="row">
      <div class="col">
      <label for="height" class="form-label">Height</label>
      <input type="text" name="height" value= " {{old ('height') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="height">
      </div>
      <div class="col">
      <label for="length" class="form-label">Length</label>
      <input type="text" name="length" value= " {{old ('length') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="length">
      </div>
    </div>
   
   
  </div>
  <div class="mb-1">
     <label for="frame_status" class="form-label">Frame Status</label>
     <select class="form-select form-select-lg mb-3" aria-label=".form-select example" style="background-color:#e4edf5;" name="frame_status" id="frame_status">
     <option selected value="Yes">Yes</option>
     <option value="No">No</option>
          </select>
     @error('frame_status')
        <div class="alert-danger">{{$message}}</div>
     @enderror
  </div>
  @endif
  @if($category_name=='Photographic Images' )
  <div class="mb-1">
     <label for="image_type" class="form-label">Image Type</label>
     <select class="form-select form-select-lg mb-3" aria-label=".form-select example" style="background-color:#e4edf5;" name="image_type" id="image_type">
     <option selected value="Black&White">Black&White</option>
     <option value="Colour">Colour</option>
          </select>
     @error('image_type')
        <div class="alert-danger">{{$message}}</div>
     @enderror
  </div>
  <div class="mb-1">
    <label for="dimension" class="form-label">Dimension</label>
    <div class="row">
      <div class="col">
      <label for="height" class="form-label">Height</label>
      <input type="text" name="height" value= " {{old ('height') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="height">
      </div>
      <div class="col">
      <label for="length" class="form-label">Length</label>
      <input type="text" name="length" value= " {{old ('length') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="length">
      </div>
    </div>
  @endif
  @if($category_name=='Sculptures' || $category_name=='Carvings')
  <div class="mb-1">
     <label for="material_used" class="form-label">Material used</label>
     <select class="form-select form-select-lg mb-3" aria-label=".form-select example" style="background-color:#e4edf5;" name="material_used" id="material_used">
     <option selected value="Bronze">Bronze</option>
     <option value="Marble">Marble</option>
     <option value="Pewter">Pewter</option>
     <option value="Other">Other</option>
          </select>
     @error('material_used')
        <div class="alert-danger">{{$message}}</div>
     @enderror
  </div>
  <div class="mb-1">
    <label for="dimension" class="form-label">Dimension</label>
    <div class="row">
      <div class="col">
      <label for="height" class="form-label">Height</label>
      <input type="text" name="height" value= " {{old ('height') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="height">
      </div>
      <div class="col">
      <label for="length" class="form-label">Length</label>
      <input type="text" name="length" value= " {{old ('length') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="length">
      </div>
      <div class="col">
      <label for="width" class="form-label">Width</label>
      <input type="text" name="width" value= " {{old ('width') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="width">
      </div>
    </div>
   
   
  </div>
  <div class="mb-1">
    <label for="weight" class="form-label">Weight</label>
    <input type="text" name="weight" value= " {{old ('weight') }} "class="form-control border border-light border-3" style="background-color:#e4edf5;" id="weight">
    @error('weight')
    <div class="alert-danger">{{$message}}</div>
    @enderror
  </div>
  @endif
      <button type="submit" class="btn btn-primary mt-3">Create this item</button>
</form>

@stop