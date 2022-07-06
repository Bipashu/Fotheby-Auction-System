@extends('layouts.adminLayout')
@section('content')

<div class="pt-3 pb-5 ps-5 pe-5 h-75">
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
      <td>{{$auction->auction_date}}</td>
     
      <td>
          
      <a href={{"auctionunarchieve/".$auction->id}}><i class="fas fa-eye" style="color:#248a72"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="auctionsModel">View unarchieved auctions.</a>
</div>

@stop