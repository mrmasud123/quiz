<?php
   /*  $name =$_POST['name'];
    $email =$_POST['email'];
    $institution =$_POST['institution'];
    $dept =$_POST['dept'];
    $password =$_POST['password'];
    include 'admin/configuration/config.inc.php';
    $query="INSERT INTO pending_teacher(t_name,department,institution,email,password) values('$name','$dept','$institution','$email','$password')";
    $result=mysqli_query($con,$query);
    if($result){
        header('location: index.php');
    }else{
        echo mysqli_error($con);
    } */
?>
<?php
session_start();
include 'php_files/config.inc.php';
        $email=mysqli_real_escape_string($con,$_POST['email']);
        $name=mysqli_real_escape_string($con,$_POST['name']);
        $institution=mysqli_real_escape_string($con,$_POST['institution']);
        $dept=mysqli_real_escape_string($con,$_POST['dept']);
        $password=mysqli_real_escape_string($con,$_POST['password']);

    if(empty($_POST['email'])){
        echo json_encode(array('error'=>'Username Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['password'])){
        echo json_encode(array('error'=>'Passowrd Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['institution'])){
        echo json_encode(array('error'=>'Institution Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['dept'])){
        echo json_encode(array('error'=>'Dept Field is Empty.','flag'=>'error'));
    }else if(empty($_POST['name'])){
        echo json_encode(array('error'=>'Name Field is Empty.','flag'=>'error'));
    }else if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $query="INSERT INTO pending_teacher(t_name,department,institution,email,password) values('$name','$dept','$institution','$email','$password')";
        $result=mysqli_query($con,$query);
        if($result){
            echo json_encode(array("success"=>"Application success"));
        }
    }else{
            echo json_encode(array("error"=>"Enter valid email","flag"=>'error'));

        }
    
    
?>