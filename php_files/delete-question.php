<?php
include '../php_files/config.inc.php';

$ques_id=$_GET['id'];
$logged_role=$_SESSION['role'];

$qid="SELECT ans_id from ques_tbl where qid=$ques_id";
$run=mysqli_fetch_assoc(mysqli_query($con,$qid))['ans_id'];
$answers="SELECT ans_id from ans_tbl where ans_id=$run";
$res=mysqli_query($con,$answers);
while($data=mysqli_fetch_assoc($res)){
   // print_r($data);
   $delete_id=$data['ans_id'];
   $delquery="DELETE from ans_tbl where ans_id=$delete_id";
   if(mysqli_query($con,$delquery)){
    $delques="DELETE from ques_tbl where qid=$ques_id";
    if(mysqli_query($con,$delques)){
       
    header("location: ../questions.php");
        
       
    }
   }
}

        

?>