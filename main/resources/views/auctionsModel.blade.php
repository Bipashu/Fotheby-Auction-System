@extends('layouts.adminLayout')
@section('content')
@if($data)
<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">All the happening auctions. <a href="create" class="text-decoration-none fw-bold">Create one.</a></p>
</div>
<div class="row my-2 pt-3">

</div>
<div class="pt-3 pb-5 ps-5 pe-5 h-75">
<table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">Auction Title</th>
      <th scope="col">Auction Date</th>
      
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($auctions as $auction)
    <tr>
      <td>{{$auction->auction_title}}</td>
      <td>{{$auction->auction_date}}</td>
  
      <td>
       
         
       
        @if($auction->auction_date>$date1 && $auction->auction_date>$date2)
        
      
          <a href={{"auctiondetails/".$auction->id}}><i class="fas fa-info" style="color:#38f548"></i></a>
          <a href={{"auctiondelete/".$auction->id}}><i class="bi bi-trash" style="color:#fa020b"></i></a>
          <a href={{"auctionedit/".$auction->id}}><i class="fas fa-edit" style="color:#2e1c80"></i></a>
          <a href={{"auctionarchieve/".$auction->id}}><i class="fas fa-archive" style="color:#248a72"></i></a>
        @else
        <a href={{"auctiondetails/".$auction->id}}><i class="fas fa-info" style="color:#38f548"></i></a>
        @endif
      </td>
      @if($auction->auction_date>=$date1 )
      <td><a href={{"attachCatalogue/".$auction->id}} class="text-decoration-none">Attach Catalogue</a></td>
      <td><a href={{"viewAuction/".$auction->id}} class="text-decoration-none">View</a></td>
      @endif
      @if($auction->auction_date<$date1)
    
    
    
      <td><a href={{"viewAuction/".$auction->id}} class="text-decoration-none">View</a></td>
      <td> <a href={{"/download/".$auction->id}}><i class="fas fa-2x fa-file-pdf" style="color:#fa0c18"></i></a></td>
      @endif
    </tr>
    @endforeach
  </tbody>
</table>
<a href="archievedAuctions">View archieved auctions.</a>
</div>
@else
<div class="d-flex bg-white h-100 ps-5">
   <p style="margin-top:250px; padding-top:7px; width:1400px; margin-bottom:500px; background-color:#fac3f7; padding-left:20px; padding-right:20px;">No auctions. <a href="create" class="text-decoration-none">Create one.</a><a href="archievedAuctions">View archieved auctions.</a></p>
</div>
@endif
@stop