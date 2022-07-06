@extends('layouts.sellerLayout')
@section('content')
@if($itemData)
<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">Here are all your items. <a href="choose">Create new.</a></p>
</div>
<div class="row my-2 pt-3">
</div>
<div class="pt-3 pb-5 ps-5 pe-5 ">
<table class="table table-stripped">
  <thead>
    <tr>
    <th scope="col">Lot Reference Number</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item Status</th>
      <th scope="col">Artist Name</th>
      <th scope="col">Year of Production</th>
      <th scope="col">Subject Classification</th>
      <th scope="col">Category Name</th>
      <th scope="col">Start Price</th>
      <th scope="col">Dimension</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $item)
    <tr>
    <td>{{$item->lot_reference_number}}</td>
      <td>{{$item->item_name}}</td>
      <td>{{$item->item_status}}</td>
      <td>{{$item->artist_name}}</td>
      <td>{{$item->year_of_production}}</td>
      <td>{{$item->subject_classification}}</td>
      <td>{{$item->category_name}}</td>
      <td>{{$item->start_price}}</td>
      <td>{{$item->dimension}}</td>
      <td>
          <a href={{"itemdetailsForSeller/".$item->id}}><i class="fas fa-info" style="color:#38f548"></i></a>
          <a href={{"itemdelete/".$item->id}}><i class="bi bi-trash" style="color:#fa020b"></i></a>
          <a href={{"itemedit/".$item->id}}><i class="fas fa-edit" style="color:#2e1c80"></i></a>
          <a href={{"itemarchieve/".$item->id}}><i class="fas fa-archive" style="color:#248a72"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="archievedItems">View Archieved Items</a>
</div>
@else
<div class="d-flex bg-white h-100 ps-5">
   <p style="margin-top:250px; padding-top:7px; width:1400px; margin-bottom:500px; background-color:#fac3f7; padding-left:20px; padding-right:20px;">Looks like there are no any items. <a href="choose" class="text-decoration-none">Create One</a> <a href="archievedItems">View Archieved Items</a></p>
  
</div>
@endif

@stop