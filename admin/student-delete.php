<?php
include '../php_files/config.inc.php';

$st_id=$_GET['id'];

$emailquery="SELECT email from users where id=$st_id";
$data=mysqli_fetch_assoc(mysqli_query($con,$emailquery))['email'];
$t_delete="DELETE from users where id=$st_id";
if(mysqli_query($con,$t_delete)){
        $delquery="DELETE from result where email='$data'";
        $res=mysqli_query($con,$delquery);
        if($res){
                header("location:students.php");
        }else{
                header("location:teachers.php");
        }
}
        

?>