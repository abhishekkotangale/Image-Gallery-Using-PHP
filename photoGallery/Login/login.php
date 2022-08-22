 <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <link rel="stylesheet" href="login.css">

    <title>Login</title>



  </head>
  <body>
     <div class="container-fluid bg-dark">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
              <a class="navbar-brand text-white" href="#">Image Gallery</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 ">
                    <li class="nav-item">
                      <a class="nav-link active text-white" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link text-white" href="#">About Us</a>
                    </li>
                </ul>
              </div>
            </div>
          </nav>
    </div> 

    
    <div class="main container-fluid">
        <div id="firefly">
                
              <div class="form";>
                  <h1 class="text-white text-center">Welcome Admin</h1>
                  <form action="logincheck.php" method="post" class="form">
                          <input type="text" class="form-control mb-3" placeholder="Type your Username" name="username" required>
                        <input type="password" class="form-control mb-3" placeholder="type your password" name="password" required>
                          <center>
                          <button type="submit" class="form-control mb-3 but" name="submit" class="btn">Submit</button>
                          </center> 
                  </form>
              </div>
        </div>  
    </div>

    





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js" 
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" 
        crossorigin="anonymous">
    </script>
    <script type="text/javascript" src="../assets/jquery.firefly-0.7.js"></script>

    <script>
    $.firefly({
    minPixel: 3,
    maxPixel : 10,
    total: 65,
    on:'#firefly'
});
    </script>
   
  </body>
</html>