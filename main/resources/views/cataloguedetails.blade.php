@extends('layouts.adminLayout')

@section('content')
<h2 class="pt-4 ps-5 text-muted ms-5">Details</h2>
<h3 class="pt-2 ps-5 pb-4 lead fw-bold text-muted ms-5">Catalogue Model.</h1>

<div class="row ps-5  pe-5 border-top border-light border-3 me-5 ms-5 pt-4">
    
    <div class="col-2"> 
       <p class="fw-bold">Catalogue Title</p>
       <p class="fw-bold">Catalogue LotNo</p>
       
       
    </div>
    <div class="col-2"> 
       <p class="text-muted">{{$catalogue->catalogue_title}}</p>
       <p class="text-muted">{{$catalogue->lot_number}}</p>
</div>

<div class="pt-5 pb-5 ps-5 pe-5 h-75">
<table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">Item Name</th>
      
      <th scope="col">Artist Name</th>
      <th scope="col">Owner Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Year of Production</th>
      <th scope="col">Subject Classification</th>
      <th scope="col">Start Price</th>
      
      <th scope="col"></th>
     
    </tr>
  </thead>
  <tbody>
    @foreach($items as $item)
    <tr>
      <td>{{$item->item_name}}</td>
      
      <td>{{$item->artist_name}}</td>
      <td>{{$item->user_name}}</td>
      <td>{{$item->category_name}}</td>
      <td>{{$item->year_of_production}}</td>
      <td>{{$item->subject_classification}}</td>
      <td>{{$item->start_price}}</td>
      
      <td>
          <a href={{"/itemdetails/".$item->id}}><i class="fas fa-info" style="color:#38f548"></i></a>
      </td>
     
    </tr>
    @endforeach
  </tbody>
</table>


@stop