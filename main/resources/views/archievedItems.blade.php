@extends('layouts.sellerLayout')
@section('content')

<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">Here are all your archieved items. </p>
</div>
<div class="row my-2 pt-3">
</div>
<div class="pt-3 pb-5 ps-5 pe-5 h-75">
<table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">Item Name</th>
      <th scope="col">Item Status</th>
      <th scope="col">Artist Name</th>
      <th scope="col">Year of Production</th>
      <th scope="col">Subject Classification</th>
      <th scope="col">Category Name</th>
      <th scope="col">Start Price</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $item)
    <tr>
      <td>{{$item->item_name}}</td>
      <td>{{$item->item_status}}</td>
      <td>{{$item->artist_name}}</td>
      <td>{{$item->year_of_production}}</td>
      <td>{{$item->subject_classification}}</td>
      <td>{{$item->category_name}}</td>
      <td>{{$item->start_price}}</td>
      <td>
            <a href={{"itemunarchieve/".$item->id}}><i class="fas fa-eye" style="color:#248a72"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="itemsModelSeller">View UnArchieved Items</a>
</div>


@stop