<?php

session_start();

include '../assets/connection.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "select * from admin where username = '$username' and password = '$password'";
        $query = mysqli_query($con,$sql);

        $row = mysqli_num_rows($query);

        if($row == 1){
            echo "login successfull";
            $_SESSION['username'] = $username;
            header('location:../index.php');
        }else{
            echo "login failed";
            header('location:login.php');
        }
    }

?>