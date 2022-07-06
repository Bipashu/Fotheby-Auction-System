<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fotheby's Auction House</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">  
    
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark bg-gradient">
    <div class="container">
        <i class="bi bi-house-fill me-2" style="color:white;"></i>
        <a class="navbar-brand" href="#intro">Fotheby's</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
        </button>
        <div class="row collapse navbar-collapse" id="navbarNavAltMarkup">
           <div class="col-lg-6">
               <div class="navbar-nav">
                   <a class="nav-link" href="/">Home</a>
                   
               </div>
           </div>
           <div class="col-lg-6">
               <div class="navbar-nav">
                    <a class="nav-link" href="/register">Register</a>
                    <a class="nav-link" href="/login">Login</a>
               </div>
           </div>
       </div>
    </div>
</nav>
<div class="container-fluid bg-white">
    @yield('content')
</div>
<!-- Copyright -->
<footer>
<div class="text-center p-3">
    © {{ date('y') }} Copyright:All rights reserved
</div>
</footer>
<!-- Copyright -->

</body>
</html>