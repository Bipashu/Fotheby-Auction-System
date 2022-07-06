@extends('layouts.adminLayout')
@section('content')
@if($data)
<div class="pt-5">
    <p class="lead ps-5 text-primary h-10 mt-3">All the present catalogues. <a href="createCatalogue" class="text-decoration-none fw-bold">Create one.</a></p>
</div>
<div class="row my-2 pt-3">

</div>
<div class="pt-3 pb-5 ps-5 pe-5 h-75">
<table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">Catalogue Title</th>
      <th scope="col">Lot Number<th>
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($catalogues as $catalogue)
    <tr>
      <td>{{$catalogue->catalogue_title}}</td>
      <td>{{$catalogue->lot_number}}</td>
      <td>
          <a href={{"cataloguedetails/".$catalogue->id}}><i class="fas fa-info" style="color:#38f548"></i></a>
          <a href={{"cataloguedelete/".$catalogue->id}}><i class="bi bi-trash" style="color:#fa020b"></i></a>
          <a href={{"catalogueedit/".$catalogue->id}}><i class="fas fa-edit" style="color:#2e1c80"></i></a>
          <a href={{"cataloguearchieve/".$catalogue->id}}><i class="fas fa-archive" style="color:#248a72"></i></a>
      </td>
      <td>
      <a href={{"addItems/".$catalogue->id}} >Add Items</a>
      </td>
      <td>
      <a href={{"view/".$catalogue->id}} >View Catalogue</a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="archievedCatalogues">View Archieved Catalogues</a>
</div>
@else
<div class="d-flex bg-white h-100 ps-5">
   <p style="margin-top:250px; padding-top:7px; width:1400px; margin-bottom:500px; background-color:#fac3f7; padding-left:20px; padding-right:20px;">No catalogues. <a href="createCatalogue" class="text-decoration-none">Create one.</a> <a href="archievedCatalogues">View Archieved Catalogues</a></p>
  
</div>
@endif
@stop