@extends('layouts.adminLayout')
@section('content')


<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">Here are all your verified items </p>
</div>

<div class="pt-5 pb-5 ps-5 pe-5 h-75">
<table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">User Name</th>
      <th scope="col">Address</th>
      <th scope="col">User Type</th>
      <th scope="col">Telephone No</th>
      <th scope="col">Bank Account No</th>
      <th scope="col">Email</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @php
      $i=0;
      $j=0;
      @endphp   
    @foreach($users as $user)
    <tr>
      <td>{{$user->name}}</td>
       <td>{{$user->address}}</td>
      <td>{{$user->user_type}}</td>
      <td>{{$user->telephone_no}}</td>
      <td>{{$user->bank_account_no}}</td>
      <td>{{$user->email}}</td>
    
     @if($user->user_type=='Seller')
     <td>{{$sales[$i]}}</td>
     <td>No of sales</td>
     @php
      $i++;
    
      @endphp
    @elseif($user->user_type=='Buyer')
    <td>{{$boughts[$j]}}</td>
    <td>No of items bought</td>
    @php
      $j++;
    
      @endphp
      @endif
    </tr>
   
    @endforeach
  </tbody>
</table>
</div>


@stop