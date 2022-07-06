@extends('layouts.adminLayout')
@section('content')


<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">Here are all your sold items </p>
</div>

<div class="pt-5 pb-5 ps-5 pe-5 h-75">
<table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">Item Name</th>
      <th scope="col">Artist Name</th>
      <th scope="col">Year of Production</th>
      <th scope="col">Category</th>
      <th scope="col">Seller</th>
      <th scope="col">Buyer</th>
      <th scope="col">Subject Classification</th>
      <th scope="col">Sold Price</th>
      <th scope="col">Commission From Seller</th>
      <th scope="col">Commission From Buyer</th>
    </tr>
  </thead>
  <tbody>
  @php
$i = 0
@endphp
    @foreach($items as $item)
    <tr>
      <td>{{$item->item_name}}</td>
       <td>{{$item->artist_name}}</td>
      <td>{{$item->year_of_production}}</td>
      <td>{{$item->category_name}}</td>
      <td>{{$item->user_name}}</td>
      <td>{{$buyers[$i]->name}}</td>
      <td>{{$item->subject_classification}}</td>
      
     
      <td >{{$soldprices[$i]->bid_amount}}</td>
     <td>{{$commissions[$i]->commission_amount}}</td>
     <td>{{$commissions[$i]->commission_amount}}</td>
    </tr>
    @php
$i++;
@endphp
    @endforeach
  </tbody>
</table>
</div>


@stop