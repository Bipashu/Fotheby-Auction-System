
@extends('layouts.adminLayout')
@section('content')
@if($commissions)
<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">Here are all the commissions from deleted items.</p>
</div>

<div class="pt-3 pb-5 ps-1 pe-1">
<table class="table table-stripped">
  <thead>
    <tr>
    <th scope="col">Commission amounts</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($commissions as $commission)
    <tr>
    <td>{{$commission->commission_amount}}</td>
     </tr>
    @endforeach
  </tbody>
</table>
</div>
@else
<div class="d-flex bg-white h-100 ps-5">
   <p style="margin-top:250px; padding-top:7px; width:1400px; margin-bottom:500px; background-color:#fac3f7; padding-left:20px; padding-right:20px;">Looks like there are no any commissions.</p>
</div>
@endif
@stop