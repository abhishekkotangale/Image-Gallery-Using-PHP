<?php
    include 'assets/connection.php';

    $id = $_GET['deleteData'];

    $deleteQuery = "delete from gallery where id='$id' ";
    
    $query = mysqli_query($con,$deleteQuery);

    if($query){
        ?>
            <script>
                alert("Inserted Successfully";)
            </script>
        <?php
            header('location:admin.php');
    }else{
        ?>
            <script>
                alert("Error! Not Inserted");
                alert("Please Try again after Some time");
            </script>
        <?php
    }
?>