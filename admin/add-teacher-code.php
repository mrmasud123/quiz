<?php
session_start();
include '../php_files/config.inc.php';
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $password=mysqli_real_escape_string($con,$_POST['password']);
        $name=mysqli_real_escape_string($con,$_POST['name']);
        $dept=mysqli_real_escape_string($con,strtolower(trim($_POST['dept'])));
        $institution=mysqli_real_escape_string($con,$_POST['institution']);

    if(empty($_POST['email'])){
        echo json_encode(array('error'=>'Username Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['password'])){
        echo json_encode(array('error'=>'Passowrd Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['name'])){
        echo json_encode(array('error'=>'Name Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['dept'])){
        echo json_encode(array('error'=>'Department Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['institution'])){
        echo json_encode(array('error'=>'Institution Field is Empty.','flag'=>'error'));
    }else if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $query="INSERT INTO teachers(name,email,password,speciality,institution) values('$name','$email','$password','$dept','$institution')";
            $run=mysqli_query($con,$query) or die("Query execution failed");
            if($run){
                echo json_encode(array("success"=>"Added teacher successfully"));
            }
        }else{
            echo json_encode(array("error"=>"Enter valid email","flag"=>'error'));

        }
    
    
?>