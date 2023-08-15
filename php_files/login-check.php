<?php
session_start();
include 'config.inc.php';
        $email=mysqli_real_escape_string($con,strtolower(trim($_POST['email'])));
        $password=mysqli_real_escape_string($con,$_POST['password']);
        $user=mysqli_real_escape_string($con,$_POST['user']);

    if(empty($_POST['email'])){
        echo json_encode(array('error'=>'Username Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['password'])){
        echo json_encode(array('error'=>'Passowrd Field is Empty.','flag'=>'error'));
    }else if(filter_var($email,FILTER_VALIDATE_EMAIL)){
            $emailCheckQuery = "SELECT email from users where email='$email'";
            $passCheckQuery = "SELECT password from users where password='$password'";
            $emailCheckResult = mysqli_query($con, $emailCheckQuery);
            $passCheckResult = mysqli_query($con, $passCheckQuery);
            $name = "SELECT * from users where email='$email' && password='$password'";
            $runQuery = mysqli_query($con, $name) or die("Naame query failed");
            if (mysqli_num_rows($emailCheckResult) > 0) {
                if (mysqli_num_rows($passCheckResult) > 0) {
                    if ($runQuery) {
                        while ($row = mysqli_fetch_assoc($runQuery)) {
                            $_SESSION['id']=$row['id'];
                            $_SESSION['name']=$row['name'];
                            $_SESSION['email']=$row['email'];
                            $_SESSION['role']="student";
                        }
                        echo json_encode(array("success"=>"Login success"));
                    }
                } else {
                    echo json_encode(array("error"=>"Password is wrong!!","flag"=>'error'));
                }
            } else {
                echo json_encode(array("error"=>"E-mail is wrong!!","flag"=>'error'));
            }
        }else{
            echo json_encode(array("error"=>"Enter valid email","flag"=>'error'));

        }
    
    
?>