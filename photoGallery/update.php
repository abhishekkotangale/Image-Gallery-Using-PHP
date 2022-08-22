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
  </head>

  <style>
    .navbar{
        background-color:red;
    }

    .form{
        margin-top:170px;
    }
  </style>

  <body>


  <header>
      <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand text-dark" href="#">Photo Gallery</a>
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


  <?php

    include 'assets/connection.php';


    $id = $_GET['update'];
    $showquery = "select * from gallery where id='$id' ";
    $showData = mysqli_query($con,$showquery);

    $result = mysqli_fetch_array($showData);


   if(isset($_POST['submit'])){
    
    $filetitle = $_POST['filetitle'];
    $filedesc = $_POST['filedesc'];
    $file = $_FILES['file'];

    $filename = $file['name'];
    $filepath = $file['tmp_name'];
    $fileerror = $file['error'];

    if($fileerror == 0){
        $destfile = 'upload/'.$filename;

        move_uploaded_file($filepath,$destfile);

        

       

        $updatequery = "update gallery set titleGallery='$filetitle',descGallery='$filedesc',imgGallery = '$destfile' where id='$id'";

        $query = mysqli_query($con,$updatequery);

        if($query){
            echo "inserted";
            header('location:admin.php');
        }else{
            echo "not inserted";
        }
    }
    }

?>



    <div class="container-fluid form">
    <div class="container update-form">
        <div class="upload-form">

            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="text" class="form-control" name="filetitle" placeholder="File Title" value="<?php echo $result['titleGallery'];?>">
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" name="filedesc" placeholder="File Description" value="<?php echo $result['descGallery'];?>">
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" name="file" >
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary" value="update">Update</button>

            </form>
        </div>
    </div>
    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>