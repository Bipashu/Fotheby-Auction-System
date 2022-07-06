@extends('layouts.buyerLayout')
@section('content')

<div class="pt-5 pb-5 ps-5 pe-5 h-75">
<table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">Item Name</th>
      <th scope="col">Item Status</th>
      <th scope="col">Artist Name</th>
      <th scope="col">Owner Name</th>
     
      <th scope="col">Category Name</th>
      <th scope="col">Year of Production</th>
      <th scope="col">Subject Classification</th>
      
      <th scope="col">Start Price</th>
    
      
    </tr>
  </thead>
  <tbody>
    @foreach($items as $item)
    <tr>
      <td>{{$item->item_name}}</td>
      <td>{{$item->item_status}}</td>
      <td>{{$item->artist_name}}</td>
      <td>{{$item->user_name}}</td>
     
      <td>{{$item->category_name}}</td>
      <td>{{$item->year_of_production}}</td>
      <td>{{$item->subject_classification}}</td>
      <td>{{$item->start_price}}</td>
     
    </tr>
    @endforeach
  </tbody>
</table>
<a href={{"/viewCatalogueForCustomer/".$auctionid}} class="text-decoration-none">View Pending Items</a>

</div>
@stop