<?php
session_start();
include 'config.inc.php';
        $email=mysqli_real_escape_string($con,strtolower(trim($_POST['email'])));
        $name=mysqli_real_escape_string($con,$_POST['name']);
        $institution=mysqli_real_escape_string($con,$_POST['institution']);
        $password=mysqli_real_escape_string($con,trim($_POST['password']));

    if(empty($_POST['email'])){
        echo json_encode(array('error'=>'E-mail Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['password'])){
        echo json_encode(array('error'=>'Passowrd Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['name'])){
        echo json_encode(array('error'=>'Name Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['institution'])){
        echo json_encode(array('error'=>'Institution Field is Empty.','flag'=>'error'));
    }else if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailCheckQuery = "SELECT email from users";
            $run=mysqli_query($con,$emailCheckQuery);
            while($data=mysqli_fetch_assoc($run)){
                if($data['email']==$email){
                    echo json_encode(array('error'=>'E-mail exists','flag'=>'error'));
                    exit;
                }else{
                    $addNew="INSERT into users(name,email,password,department,institution) values('$name','$email','$password','','$institution')";
                    if(mysqli_query($con,$addNew)){
                        echo json_encode(array("success"=>"Registration success"));

                    }else{
                        echo json_encode(array("success"=>"Registration failed.". mysqli_error($con)));
                    }
                }
            }
        }else{
            echo json_encode(array("error"=>"Enter valid email","flag"=>'error'));

        }
    
    
?>