<?php
include '../php_files/config.inc.php';
        session_start();
        $email=$_POST['data']['lemail'];
        $password=$_POST['data']['lpassword'];        
            if($email==" " || $password==" "){
                echo "All the fields are required";
            }else{
                $emailCheckQuery="SELECT email from lstable where email='$email'";
                $passCheckQuery="SELECT password from lstable where password='$password'";
                $emailCheckResult=mysqli_query($con, $emailCheckQuery);
                $passCheckResult=mysqli_query($con, $passCheckQuery);
                $name="SELECT * from lstable where email='$email' && password='$password'";
                $runQuery=mysqli_query($con, $name) or die("Naame query failed");
                if(mysqli_num_rows($emailCheckResult)>0){
                    if(mysqli_num_rows($passCheckResult)){
                        if($runQuery){
                            while($row=mysqli_fetch_assoc($runQuery)){
                            $_SESSION['name']=$row['username'];
                            $_SESSION['email']=$row['email'];
                            $_SESSION['speciality']=$row['speciality'];
                            echo 0;
                            }
                        }
                    }else{
                        echo "password is wrong";
                    }
                }else{
                    echo "Email is wrong";
                }
            }
        
?>