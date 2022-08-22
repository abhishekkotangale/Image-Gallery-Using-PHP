<?php

  session_start();

  if(!isset($_SESSION['username'])){
    header('location:index.php');
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Add Image</title>
    <link rel="stylesheet" href="add-image.css">
  </head>
  <body>
    
  <header>
      <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Photo Gallery</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars" style="font-size:35px;color:black"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item ">
                    <a class="nav-link text-dark" href="index.php">Home</a>
                    </li>
                    <li class="nav-item ">
                    <a class="nav-link text-dark" href="#">About Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php



                  if(isset($_SESSION['username'])){
                    echo '<li class="nav-item ">
                    <a class="nav-link text-dark" href="login/logout.php">Logout</a>
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
  </header>
    

    <div class="new">
    <div class="container-fluid table-area">
      <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
              <tr class="text-center text-white">
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Images</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
                include 'assets/connection.php';
                $selectQuery = "select * from gallery";
                $query = mysqli_query($con , $selectQuery);
                while($result = mysqli_fetch_array($query)){
                  ?>

              <tr class=" form-content text-center text-white">
                <td><?php echo $result['id'];?></td>
                <td><?php echo $result['titleGallery'];?></td>
                <td><?php echo $result['descGallery'];?></td>
                <td><img src="<?php echo $result['imgGallery'];?>" width="100" height="100"></td>
                <td><a href="update.php?update=<?php echo $result['id']; ?>"><i class="fa fa-edit"></i></a></td>
                <td><a href="delete.php?deleteData=<?php echo $result['id']; ?>"><i class="fa fa-trash"></i></a></td>
              </tr>



                  <?php
                }
                ?>
              
            </tbody>
        </table>
      </div>
    </div>
    </div>



   <div class="container-fluid add-image">
    <div class="container add-image-form">
      <center>
        <div class="title">
          <h1 class="text-white">Add Image</h1>
        </div>
      </center>
    <?php
          if(isset($_SESSION['username'])){
            echo '<div class="container">
              <div class="upload-form">
                  <form action="upload.php" method="post" enctype="multipart/form-data">
                  
                      <div class="mb-3">
                          <input type="text" class="form-control" name="filename" placeholder="File Name">
                      </div>
                      <div class="mb-3">
                          <input type="text" class="form-control" name="filetitle" placeholder="File Title">
                      </div>
                      <div class="mb-3">
                          <input type="text" class="form-control" name="filedesc" placeholder="File Description">
                      </div>
                      <div class="mb-3">
                          <input type="file" class="form-control" name="file">
                      </div>
                      
                      <center>
                         <button type="submit" name="submit" class="btn">Submit</button>
                      </center>
                  </form>
              </div>
          </div>' ;
          }
      ?>
    </div>
   </div>

   <footer>
    <div class="footer text-center">
      <h5>All Rights Reserved</h5>
    </div>
   </footer>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>