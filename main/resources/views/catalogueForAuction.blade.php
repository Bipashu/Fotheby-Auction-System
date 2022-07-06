@extends('layouts.adminLayout')
@section('content')


<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">{{$catalogue->catalogue_title}}</p>
    <p class="lead ps-5 text-primary h-10 mt-3">{{$catalogue->lot_number}}</p>
</div>
@if($isitems)
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
      <th scope="col"></th>
      <th scope="col"></th>
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

</div>
@else
<div class="d-flex bg-white h-100 ps-5">
   <p style="margin-top:250px; padding-top:7px; width:1400px; margin-bottom:500px; background-color:#fac3f7; padding-left:20px; padding-right:20px;">Looks like there are no any items.<a href={{"/hiddens/".$catalogue->id}}>View hidden ones.</a></p>
</div>
@endif
@stop