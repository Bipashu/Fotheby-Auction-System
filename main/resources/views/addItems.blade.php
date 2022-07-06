@extends('layouts.adminLayout')
@section('content')


<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">Here are all the items for adding.</p>
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
      <td> <a href={{"/itemAdded/".$catalogue_id."/".$item->id}} ><i class="fas fa-check" style="color:#0b9c28;"></i></a></td>
      <td>
          <a href={{"itemdetails/".$item->id}}><i class="fas fa-info" style="color:#38f548"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>


@stop