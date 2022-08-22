<?php

  session_start();

  if(!isset($_SESSION['username'])){
    header('location:index.php');
  }
?>

<?php

    include 'assets/connection.php';

    if(isset($_POST['submit'])){
        $filename = $_POST['filename'];
        $filetitle = $_POST['filetitle'];
        $filedesc = $_POST['filedesc'];
        $file = $_FILES['file'];

        $filename = $file['name'];
        $filepath = $file['tmp_name'];
        $fileerror = $file['error'];

        if($fileerror == 0){
            $destfile = 'upload/'.$filename;

            move_uploaded_file($filepath,$destfile);

            $insertquery = "insert into gallery(titleGallery,descGallery,imgGallery) values('$filetitle','$filedesc','$destfile')";

            $query = mysqli_query($con,$insertquery);

            if($query){
                echo "inserted";
                header('location:index.php');
            }else{
                echo "not inserted";
            }
        }
    }

?>