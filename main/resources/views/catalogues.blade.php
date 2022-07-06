@extends('layouts.adminLayout')
@section('content')
@if($auction->has_catalogue=='no')

<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">Existing catalogues.</p>
</div>

<div class="pt-5 pb-5 ps-5 pe-5 h-75">
<table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">Catalogue Title</th>
      
      <th scope="col"></th>
      <th scope="col"></th>
      
     
    </tr>
  </thead>
  <tbody>
    @foreach($catalogues as $catalogue)
    <tr>
      <td>{{$catalogue->catalogue_title}}</td>
      
      <td><a href={{"/viewForAuction/".$catalogue->id}} >view this</a></td>
      <td><a href={{"/attach/".$auctionId."/".$catalogue->id}} >Attach this</a></td>
      
      
    
    </tr>
    @endforeach
  </tbody>
</table>

</div>
@else
<div class="d-flex bg-white h-100 ps-5">
   <p style="margin-top:250px; padding-top:7px; width:1400px; margin-bottom:500px; background-color:#fac3f7; padding-left:20px; padding-right:20px;">Looks like you already have a catalogue.</p>
</div>
@endif

@stop