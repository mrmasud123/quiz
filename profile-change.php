<?php
    session_start();
    include 'php_files/config.inc.php';
    $filename=$_FILES['chngImg']['name'];
    $filetmpname=$_FILES['chngImg']['tmp_name'];
    $filesize=$_FILES['chngImg']['size'];
    $filetype=$_FILES['chngImg']['type'];
    $user_name=$_SESSION['name'];
    $email=$_SESSION['email'];
    $role=$_SESSION['role'];
    if($role=='student'){
        move_uploaded_file($filetmpname,"assets/user_upload/".$filename);
        $updateQuery="UPDATE users set img_path='$filename' where email='$email'";
    }else{
        move_uploaded_file($filetmpname,"assets/user_upload/".$filename);
        $updateQuery="UPDATE teachers set img_path='$filename' where email='$email'";
    }
       
        $run=mysqli_query($con,$updateQuery);
        if($run){
            header('location: profile.php');
        }
    
    
    
?>