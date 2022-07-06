@extends('layouts.adminLayout')

@section('content')
<h2 class="pt-4 ps-5 text-muted ms-5">Details</h2>
<h3 class="pt-2 ps-5 pb-4 lead fw-bold text-muted ms-5">Item Model.</h1>

<div class="row ps-5  pe-5 border-top border-light border-3 me-5 ms-5 pt-4">
    
    <div class="col-2"> 
    
    <p class="fw-bold">Item Lot Reference No.</p>
       <p class="fw-bold">Item Name</p>
       <p class="fw-bold">Item Status</p>
       <p class="fw-bold">Item Category</p>
       <p class="fw-bold">Item Owner</p>
       <p class="fw-bold">Artist Name</p>
       <p class="fw-bold">Year of Production</p>
       <p class="fw-bold">Subject Classification</p>
       <p class="fw-bold">Dimension</p>
       <p class="fw-bold">Start Price</p>
       
       @if($item->category_name=='Drawings' || $item->category_name=='Paintings')
       <p class="fw-bold">Medium</p>
       <p class="fw-bold">Is Frame</p>
       <p class="fw-bold">Dimension</p>
       @endif
       @if($item->category_name=='Photographic Images')
       <p class="fw-bold">Image Type</p>
       <p class="fw-bold">Dimension</p>
       @endif
       @if($item->category_name=='Sculptures' || $item->category_name=='Carvings')
       <p class="fw-bold">Material</p>
       <p class="fw-bold">Dimension</p>
       <p class="fw-bold">Weight</p>
       @endif
       <p class="fw-bold">Description</p>
    </div>
    <div class="col-2"> 
  
    <p class="text-muted">{{$item->lot_reference_number}}</p>
       <p class="text-muted">{{$item->item_name}}</p>
       <p class="text-muted">{{$item->item_status}}</p>
       <p class="text-muted">{{$item->category_name}}</p>
       <p class="text-muted">{{$item->user_name}}</p>
       <p class="text-muted">{{$item->artist_name}}</p>
       <p class="text-muted">{{$item->year_of_production}}</p>
       <p class="text-muted">{{$item->subject_classification}}</p>
       <p class="text-muted">{{$item->dimension}}</p>
       <p class="text-muted">{{$item->start_price}}</p>
       
       @if($item->category_name=='Drawings'  || $item->category_name=='Paintings')
       <p class="text-muted">{{$item->medium}}</p>
       <p class="text-muted">{{$item->frame_status}}</p>
       <p class="text-muted">{{$item->dimension}}</p>
       @endif
       @if($item->category_name=='Photographic Images')
       <p class="text-muted">{{$item->image_type}}</p>
       <p class="text-muted">{{$item->dimension}}</p>
       @endif
       @if($item->category_name=='Sculptures'|| $item->category_name=='Carvings')
       <p class="text-muted">{{$item->material_used}}</p>
       <p class="text-muted">{{$item->dimension}}</p>
       <p class="text-muted">{{$item->weight}}</p>
       @endif
       <p class="text-muted">{{$item->description}}</p>
    </div>
    <div class="col-6 ms-5"> 
      <img src="{{asset('images/'.$item->picture)}}" width="500px" height="400px"/>
    </div>

</div>


@stop