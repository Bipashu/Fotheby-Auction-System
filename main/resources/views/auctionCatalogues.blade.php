@extends('layouts.buyerLayout')
@section('content')


@if($isauctions)
<div class="pt-3 pb-5 ps-1 pe-1">
<table class="table table-stripped">
  <thead>
    <tr>
    <th scope="col">Auction Title</th>
    <th scope="col">Auction Date</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach($auctions as $auction)
    <tr>
    <td>{{$auction->auction_title}}</td>
    @if($auction->auction_date==$date1)
     <td>ongoing</td>

     @elseif($auction->auction_date==$date2)
     <td>tomorrow</td>
   @endif
      <td><a href={{"viewCatalogueForCustomer/".$auction->id}} class="text-decoration-none">View Items Catalogue.</a></td>
     
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@else
<div class="d-flex bg-white h-100 ps-5">
   <p style="margin-top:250px; padding-top:7px; width:1400px; margin-bottom:500px; background-color:#fac3f7; padding-left:20px; padding-right:20px;">No happening auctions sorry.</p>
</div>
@endif

@stop