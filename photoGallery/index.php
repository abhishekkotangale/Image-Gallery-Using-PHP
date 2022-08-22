<?php
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Gallery</title>

    <!-- Water ripples effect-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ripples/0.5.3/jquery.ripples.min.js"></script>


    <!-- external css Link-->
    <link rel="stylesheet" href="style.css">

    <style>
        .img-displayed{
	overflow: hidden;
  }

  .img-displayed img{
    display: block;
    transition: transform 2s;
  }

  .img-displayed:hover img{
    transform: scale(1.3);
  }
      </style>

  </head>
  <body>


  <div class="container-fluid">
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
          <a class="navbar-brand" href="#">Photo Gallery</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item ">
                  <a class="nav-link" href="#">About Us</a>
                  </li>
              </ul>


              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php
                  if(isset($_SESSION['username'])){
                    echo '<li class="nav-item ">
                    <a class="nav-link" href="admin.php">Add Image</a>
                    </li>';
                    echo '<li class="nav-item ">
                    <a class="nav-link" href="login/logout.php">Logout</a>
                    </li>';
                  }else{
                    echo '<li class="nav-item ">
                    <a class="nav-link" href="login/login.php">Login</a>
                    </li>';
                  }
                ?>
              </ul>
           </div>
        </div>
    </nav>

        <div class="full-landing-image container-fluid"> 
          <div class="banner-image" style="padding-top:6%;">
            <center>
                <div class="inner-banner-image">
                  <div class="banner-content">
                      
                            <h1 class="text-white">Welcome To Image gallery</h1>
                            <h5 class="text-white">We Display Best images with Best quality</h5>
                            <p class="change-color">Scroll Down to To check images</p>   
                  </div>
                </div> 
              <center>
            </div>
        </div>
    
  </div>

  



    <div class="bg-color" style="background-color: #EFFFFD;">
    <div class="container-fluid gallery">
      <div class="container">
        <center>
        <div class="title">
          <h1>Photo Gallery</h1>
        </div>
        </center>

          <div class="container">
                  <div class="row">
                        <?php
                            include 'assets/connection.php';
                            $selectquery = "select * from gallery ORDER BY id DESC";

                            $query = mysqli_query($con,$selectquery);
                            while($result = mysqli_fetch_array($query)){
                              
                                ?>
                                <div class=" col-sm-12 col-md-6 col-lg-4 display-img">
                                <a herf="#">
                                <div class="img-displayed"><img src="<?php echo $result['imgGallery'];?>" class="img-fluid" style="height:300px; width:100%";></div>
                              
                                <h3 class="text-center p-2"><?php echo $result['titleGallery'];?></h3>
                                <p class="text-center"><?php echo $result['descGallery'];?></p>
                              
                                </a>
                            </div>
                            <?php    
                            }
                        ?>    
                  </div>
          </div> 
      </div>
    </div>
    </div>
  
    <footer>
    <div class="footer text-center" style="background-color: black;color: white;padding-top: 15px;padding-bottom: 5px;">
      <h5>All Rights Reserved</h5>
    </div>
   </footer>
    

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   

    <!-- Water Ripples effect -->
    <script type="text/javascript">
		$(".full-landing-image").ripples({
			resolution: 512,
			dropRadius: 20,
			interactive: true,
			perturbance: 0.02,
		});
	</script>

  </body>
</html>