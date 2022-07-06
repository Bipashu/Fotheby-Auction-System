@extends('layouts.adminLayout')
@section('content')
@if($verifiedItems)

<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">Here are all the verified items in the house.</p>
</div>

<div class="pt-5 pb-5 ps-5 pe-5 h-75">
<table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">Item Name</th>
      <th scope="col">Lot Reference Number</th>
      <th scope="col">Artist Name</th>
      <th scope="col">Item Status</th>
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
      <td>{{$item->lot_reference_number}}</td>
      <td>{{$item->artist_name}}</td>
      <td>{{$item->item_status}}</td>
      <td>{{$item->user_name}}</td>
      <td>{{$item->category_name}}</td>
      <td>{{$item->year_of_production}}</td>
      <td>{{$item->subject_classification}}</td>
      <td>{{$item->start_price}}</td>
      
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@else
<div class="d-flex bg-white h-100 ps-5">
   <p style="margin-top:250px; padding-top:7px; width:1400px; margin-bottom:500px; background-color:#fac3f7; padding-left:20px; padding-right:20px;">Looks like there are no any verified items items. Maybe verify some items?<a href="itemsModel" class="text-decoration-none">Verify here.</a></p>
</div>
@endif

@stop