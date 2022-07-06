@extends('layouts.adminLayout')
@section('content')

<div class="pt-5 pb-5 ps-5 pe-5 h-75">
<table class="table table-stripped">
  <thead>
    <tr>
    <th scope="col">Bidder </th>
    <th scope="col">Bidder email </th>
      <th scope="col">Bid Amount</th>
      
      <th scope="col"></th>
      
      
    </tr>
  </thead>
  <tbody>
  @php
$i = 0
@endphp  
    @foreach($bids as $bid)
 
    <tr>
    <td>{{$bidders[$i]->name}}</td>
    <td>{{$bidders[$i]->email}}</td>
      <td>{{$bid->bid_amount}}</td>
      
     <td><a href={{"/sellItem/".$bid->item_id."/".$bid->buyer_id."/".$auctionid."/".$bid->id}} class="text-decoration-none">Sell to this.</a></td>
      
    </tr>
    @php
$i++;
@endphp
    @endforeach
  </tbody>
</table>



@stop