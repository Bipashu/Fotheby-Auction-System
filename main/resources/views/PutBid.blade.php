@extends('layouts.buyerLayout')
@section('content')
@if($bids)
<<div class="d-flex bg-white h-100 ps-5">
   <p style="margin-top:250px; padding-top:7px; width:1400px; margin-bottom:500px; background-color:#fac3f7; padding-left:20px; padding-right:20px;">You have already bidded this item.</p>
  
</div>
@else

<div class="pt-5 pb-5 ps-5 pe-5 h-75">
<form action={{"/bid/".$id}} method="POST" class="col-4">
@csrf
  <div class="form-group ps-5">
    <input type="text" class="form-control" placeholder="Bid your amount" name="bid_amount"  >
    @error('bid_amount')
        <div class="alert-danger">{{$message}}</div>
     @enderror
  </div>
  <button class="btn btn-primary ms-5 mt-3">Bid</button>
  
</form>
</div>
@endif
@stop