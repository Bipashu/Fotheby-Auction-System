@extends('layouts.buyerLayout')
@section('content')

<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">Here are all the  items in the house.</p>
</div>
<div class="row my-2 pt-3">
<form action="" method="GET" class="col-9">

  <div class="form-group ps-5">
    <input type="search" class="form-control" placeholder="Search by  or auctiondate ....." name="auction_date" value="" >
  </div>
  <button class="btn btn-primary ms-5 mt-3">Search</button>
  <a href="/allitems">
    <button class="btn btn-primary mt-3" type="button">Reset</button>
  </a>
</form>
<form action="" method="GET" class="col-9">

  <div class="form-group ps-5">
      <div class="row">
          <div class="col-3">
    <input type="search" class="form-control" placeholder="Search by item name ....." name="item_name" value="" ></div>
    <div class="col-3">
    <input type="search" class="form-control" placeholder="Search by category name ....." name="category_name" value="" ></div>
    </div>
  </div>
  <button class="btn btn-primary ms-5 mt-3">Search</button>
  <a href="/allitems">
    <button class="btn btn-primary mt-3" type="button">Reset</button>
  </a>
</form>
<form action="" method="GET" class="col-9">

  <div class="form-group ps-5">
    <input type="search" class="form-control" placeholder="Search by item name or artist name or category or price  or classification ....." name="search" value="{{$search3}}" >
  </div>
  <button class="btn btn-primary ms-5 mt-3">Search</button>
  <a href="/allitems">
    <button class="btn btn-primary mt-3" type="button">Reset</button>
  </a>
</form>
</div>
<div class="pt-5 pb-5 ps-5 pe-5 ">
<table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">Item Name</th>
      
      <th scope="col">Artist Name</th>
      <th scope="col">Owner Name</th>
      <th scope="col">Item Status</th>
      <th scope="col">Category Name</th>
      <th scope="col">Year of Production</th>
      <th scope="col">Subject Classification</th>
      <th scope="col">Start Price</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($items as $item)
    <tr>
      <td>{{$item->item_name}}</td>
      
      <td>{{$item->artist_name}}</td>
      <td>{{$item->user_name}}</td>
      <td>{{$item->item_status}}</td>
      <td>{{$item->category_name}}</td>
      <td>{{$item->year_of_production}}</td>
      <td>{{$item->subject_classification}}</td>
      <td>{{$item->start_price}}</td>
      <td><a href={{"/itemdetailsForCustomer/".$item->id}}><i class="fas fa-info" style="color:#38f548"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>


@stop