<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>
    @foreach($catalogues as $catalogue)
    <div class="pt-5">
    <p class="lead ps-5  h-10 mt-3">{{$auction->auction_title}}</p>   
    <p class="lead ps-5  h-10 mt-3">{{$catalogue->catalogue_title}}</p>
    <p class="lead ps-5  h-10 mt-3">{{$catalogue->lot_number}}</p>
</div>
    @endforeach
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
      <th scope="col">Sold price</th>
      <th scope="col">Commission from buyer</th>
      <th scope="col">Commission from seller</th>
    </tr>
  </thead>
  <tbody>
  @php
$i = 0
@endphp
    @foreach($items as $item)
    <tr>
      <td>{{$item->item_name}}</td>
      
      <td>{{$item->artist_name}}</td>
      <td>{{$item->user_name}}</td>
     

      <td>Sold</td>
     
      <td>{{$item->category_name}}</td>
      <td>{{$item->year_of_production}}</td>
      <td>{{$item->subject_classification}}</td>
      <td>{{$item->start_price}}</td>
     
      <td >{{$soldprices[$i]->bid_amount}}</td>
     <td>{{$commissions[$i]->commission_amount}}</td>
     <td>{{$commissions[$i]->commission_amount}}</td>
     
    </tr>
    @php
$i++;
@endphp
    @endforeach
  </tbody>
</table>
<table class="table">
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
     
     
    </tr>
  </thead>
  <tbody>
 
    @foreach($unsolds as $item)
    <tr>
      <td>{{$item->item_name}}</td>
      
      <td>{{$item->artist_name}}</td>
      <td>{{$item->user_name}}</td>
     

      <td>Unsold</td>
     
      <td>{{$item->category_name}}</td>
      <td>{{$item->year_of_production}}</td>
      <td>{{$item->subject_classification}}</td>
      <td>{{$item->start_price}}</td>
     
    
     
    </tr>
 
    @endforeach
  </tbody>
</table>
</table>
<table class="table">
  <thead>
    <tr>
    <th scope="col">Commission Amount</th>
      
     
     
     
    </tr>
  </thead>
  <tbody>
 <p>Commission from deleted items.</p>
    @foreach($coms as $com)
    <tr>
      <td>{{$com->commission_amount}}</td>
      
      
    
     
    </tr>
 
    @endforeach
  </tbody>
</table>

</div>

</body>
</html>