@extends('layouts.adminLayout')
@section('content')

<div class="pt-3 pb-5 ps-5 pe-5 h-75">
<table class="table table-stripped">
  <thead>
    <tr>
      <th scope="col">Catalogue Title</th>
      
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    @foreach($catalogues as $catalogue)
    <tr>
      <td>{{$catalogue->catalogue_title}}</td>
      
      <td>
          
          <a href={{"catalogueunarchieve/".$catalogue->id}}><i class="fas fa-eye" style="color:#248a72"></i></a>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
<a href="cataloguesModel">View UnArchieved Catalogues</a>
</div>

@stop