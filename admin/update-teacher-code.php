<?php
session_start();
include '../php_files/config.inc.php';
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $id=mysqli_real_escape_string($con,$_POST['id']);
        $password=mysqli_real_escape_string($con,$_POST['password']);
        $name=mysqli_real_escape_string($con,$_POST['name']);
        
        $institution=mysqli_real_escape_string($con,$_POST['institution']);

    if(empty($_POST['email'])){
        echo json_encode(array('error'=>'Username Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['password'])){
        echo json_encode(array('error'=>'Passowrd Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['name'])){
        echo json_encode(array('error'=>'Name Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['institution'])){
        echo json_encode(array('error'=>'Institution Field is Empty.','flag'=>'error'));
    }else if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $getEmail="SELECT email from teachers where id=$id";
            $existingEmail=mysqli_fetch_assoc(mysqli_query($con,$getEmail))['email'];
            $query="UPDATE teachers set name='$name',email='$email',password='$password',institution='$institution' where id=$id";
            $run=mysqli_query($con,$query) or die("Query execution failed");
            if($run){
                
                $update="UPDATE ques_tbl set author='$email' where author='$existingEmail'";
                if(mysqli_query($con,$update)){
                    $emialUpdate="UPDATE tutorials set email='$email' where email='$existingEmail'";
                    if(mysqli_query($con,$emialUpdate)){
                        echo json_encode(array("success"=>"Updataion teacher successfully"));
                    }
                    
                }
            }
        }else{
            echo json_encode(array("error"=>"Enter valid email","flag"=>'error'));
        }
    
    
?>