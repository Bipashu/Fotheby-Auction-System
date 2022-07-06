
@extends('layouts.adminLayout')
@section('content')
@if($data)
<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">Here are all the items in the house.</p>
</div>
<div class="row my-2 pt-3">
<form action="" method="GET" class="col-9">

  <div class="form-group ps-5">
    <input type="search" class="form-control" placeholder="Search by item name or artist name.." name="search" value="{{$search}}" >
  </div>
  <button class="btn btn-primary ms-5 mt-3">Search</button>
  <a href="itemsModel">
    <button class="btn btn-primary mt-3" type="button">Reset</button>
  </a>
</form>
</div>
<div class="pt-3 pb-5 ps-1 pe-1">
<table class="table table-stripped">
  <thead>
    <tr>
    <th scope="col">Lot Reference Number</th>
      <th scope="col">Item Name</th>
      <th scope="col">Item Status</th>
      <th scope="col">Artist Name</th>
      <th scope="col">Owner Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Year of Production</th>
      <th scope="col">Subject Classification</th>
      <th scope="col">Dimension</th>
      <th scope="col">Start Price</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($items as $item)
    <tr>
    <td>{{$item->lot_reference_number}}</td>
      <td>{{$item->item_name}}</td>
      <td>{{$item->item_status}}</td>
      <td>{{$item->artist_name}}</td>
      <td>{{$item->user_name}}</td>
      <td>{{$item->category_name}}</td>
      <td>{{$item->year_of_production}}</td>
      <td>{{$item->subject_classification}}</td>
      <td>{{$item->dimension}}</td>
      <td>{{$item->start_price}}</td>
      <td>
          <a href={{"itemverified/".$item->id}}><i class="fas fa-check" style="color:#0b9c28;"></i></a>
         
      </td>
      <td>
          <a href={{"itemdetails/".$item->id}}><i class="fas fa-info" style="color:#38f548"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@else
<div class="d-flex bg-white h-100 ps-5">
   <p style="margin-top:250px; padding-top:7px; width:1400px; margin-bottom:500px; background-color:#fac3f7; padding-left:20px; padding-right:20px;">Looks like there are no any items.</p>
</div>
@endif
@stop