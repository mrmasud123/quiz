<?php

    echo $id=$_GET['id'];

    include '../php_files/config.inc.php';
    $query="SELECT * from pending_teacher where id=$id";
    $run=mysqli_query($con,$query) or die("Tutorial query failed");
    if(mysqli_num_rows($run)>0){
    $data=mysqli_fetch_assoc($run);
    $t_name=$data['t_name'];
    $t_department=$data['department'];
    $t_institution=$data['institution'];
    $t_email=$data['email'];
    $t_password=$data['password'];
    $insquery="INSERT INTO teachers(name,email,password,speciality,institution) values('$t_name','$t_email','$t_password','$t_department','$t_institution')";
    $insrun=mysqli_query($con,$insquery) or die("Tutorial query failed");
    if(mysqli_num_rows($run)>0){
        $delquery="DELETE from pending_teacher where id=$id";
        $insrun=mysqli_query($con,$delquery) or die("Tutorial query failed");
        header("location: index.php");
    }
}
?>