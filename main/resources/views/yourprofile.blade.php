
@extends('layouts.buyerLayout')


@section('content')
<h2 class="pt-4 ps-5 text-muted ms-5">Profile</h2>

<div class="row ps-5  pe-5 border-top border-light border-3 me-5 ms-5 pt-4 h-75">
    
    <div class="col-2"> 
    
    <p class="fw-bold">User Name</p>
       <p class="fw-bold">Email</p>
       <p class="fw-bold">Telephone No</p>
       <p class="fw-bold">Address</p>
       <p class="fw-bold">Bank Account No</p>
       
    </div>
    <div class="col-2"> 
  
    <p class="text-muted">{{$user->name}}</p>
       <p class="text-muted">{{$user->email}}</p>
       <p class="text-muted">{{$user->telephone_no}}</p>
       <p class="text-muted">{{$user->category_name}}</p>
       <p class="text-muted">{{$user->address}}</p>
       <p class="text-muted">{{$user->bank_account_no}}</p>
       

</div>


@stop