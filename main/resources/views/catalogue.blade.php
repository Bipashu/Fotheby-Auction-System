@extends('layouts.adminLayout')
@section('content')


<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">{{$catalogue->catalogue_title}}</p>
</div>
@if($isitems)
<form action="" method="GET" class="col-9">

  <div class="form-group ps-5">
    <input type="search" class="form-control" placeholder="Search by item name..." name="search" value="{{$search}}" >
  </div>
  <button class="btn btn-primary ms-5 mt-3">Search</button>
  <a href={{"/view/".$catalogue->id}}>
    <button class="btn btn-primary mt-3" type="button">Reset</button>
  </a>
</form>
<div class="pt-5 pb-5 ps-5 pe-5 h-75">
<table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">Item Name</th>
      <th scope="col">Lot Reference Number</th>
      <th scope="col">Artist Name</th>
      <th scope="col">Owner Name</th>
      <th scope="col">Category Name</th>
      <th scope="col">Year of Production</th>
      <th scope="col">Subject Classification</th>
      <th scope="col">Start Price</th>
      
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($items as $item)
    <tr>
      <td>{{$item->item_name}}</td>
      <td>{{$item->lot_reference_number}}</td>
      <td>{{$item->artist_name}}</td>
      <td>{{$item->user_name}}</td>
      <td>{{$item->category_name}}</td>
      <td>{{$item->year_of_production}}</td>
      <td>{{$item->subject_classification}}</td>
      <td>{{$item->start_price}}</td>
      
      <td>
          <a href={{"itemdetails/".$item->id}}><i class="fas fa-info" style="color:#38f548"></i></a>
      </td>
      <td>
          <a href={{"itemremove/".$item->catalogue_id."/".$item->id}}><i class="fas fa-minus-circle" style="color:#91030a"></i></a>
      </td>
      <td>
          <a href={{"itemhide/".$item->catalogue_id."/".$item->id}}><i class="fas fa-eye-slash"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href={{"/hiddens/".$item->catalogue_id}}>View hidden ones.</a>
</div>
@else
<div class="d-flex bg-white h-100 ps-5">
   <p style="margin-top:250px; padding-top:7px; width:1400px; margin-bottom:500px; background-color:#fac3f7; padding-left:20px; padding-right:20px;">Looks like there are no any items.</p>
</div>
@endif
@stop