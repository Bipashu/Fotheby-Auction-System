@extends('layouts.publicLayout')

@section('content')
<!--fourth section-->
<div class="container mt-5 bg-white">
    <div class="row">
        <div class="col-md-6" style="padding-top:150px; padding-left:50px; padding-right:50px;">
            <h4>From drawings to carvings</h4>
            <p class="lead text-muted">All auction items are currently classified into five categories; these are paintings, drawings, photographic images, sculptures and carvings.</p>
        </div>
        <div class="col-md-6">
        <img src="{{ URL('images/house1.jpg') }}" alt="house1" style="height:50vh; width:40.5vw;">
        </div>
    </div>
</div>

<!--fifth section-->
<div class="container bg-white" id="intro">
    <div class="row">
        <div class="col-md-6">
        <img src="{{ URL('images/house2.png') }}" alt="house2" style="height:50vh; width:41.25vw;">
        </div>
        <div class="col-md-6" style="padding-top:150px; padding-left:50px; padding-right:50px;">
            <h4>Completely Trustable</h4>
            <p class="lead text-muted">Items from our sellers are first examined by the house and then only verified for the catalogue inclusion and further inventoring into the auction.Also, the details of each item are given.</p>
        </div>
    </div>
</div>

<!-- <div class="container pt-5 mt-5">
<h4>Some of the items in the house.</h4>
    <div class="row justify-content-center">
        
        <div class="col-md-4 text-wrap">
        <img src="{{asset('images/'.$items[0]->picture)}}" width="470px" height="400px"/>
        </div>
        <div class="col-md-4 text-wrap">
        <img src="{{asset('images/'.$items[1]->picture)}}" width="470px" height="400px"/>
        </div>
        <div class="col-md-4 text-wrap">
        <img src="{{asset('images/'.$items[2]->picture)}}" width="470px" height="400px"/>
        </div>
    </div>
</div> -->

@stop