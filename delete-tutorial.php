<?php

    session_start();
    if(isset($_SESSION['id'])){
        $id=$_GET['id'];
        include 'php_files/config.inc.php';
        $query="DELETE from tutorials where id=$id";
        if(mysqli_query($con,$query)){
            header("location:view-content.php");
        }
    }

?>