@extends('layouts.adminLayout')
@section('content')
<h2 class="pt-4 ps-5 text-muted ms-5">Details</h2>
<h3 class="pt-2 ps-5 pb-4 lead fw-bold text-muted ms-5">Auction Model.</h1>

<div class="row ps-5  pe-5 border-top border-light border-3 me-5 ms-5 pt-4">
    
    <div class="col-2"> 
       <p class="fw-bold">Auction Title</p>
       
       <p class="fw-bold">Auction Date</p>
       
    </div>
    <div class="col-2"> 
       <p class="text-muted">{{$auction->auction_title}}</p>
       <p class="text-muted">{{$auction->auction_date}}</p>
</div>

</div>
@if($iscatalogue)
<div class="pt-5 pb-5 ps-5 pe-5 h-75">
<table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">Catalogue Title</th>
      <th scope="col">Lot Number</th>
      
      
      <th scope="col"></th>
     
    </tr>
  </thead>
  <tbody>
    @foreach($catalogues as $catalogue)
    <tr>
      <td>{{$catalogue->catalogue_title}}</td>
      
      <td>{{$catalogue->lot_number}}</td>
      
      <td>
          <a href={{"/cataloguedetails/".$catalogue->id}}><i class="fas fa-info" style="color:#38f548"></i></a>
      </td>
     
    </tr>
    @endforeach
  </tbody>
</table>
</div>

@endif

@stop