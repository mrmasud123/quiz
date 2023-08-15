<?php
include '../php_files/config.inc.php';
session_start();
    if(isset($_SESSION['name'])){
       $author=$_SESSION['email'];
       $ques= $_POST['ques'];
       $ans_id= $_POST['aid'];
       $dept= strtolower(trim($_POST['qdept']));
       $option1= $_POST['opt_1'];
        $option2= $_POST['opt_2'];
       $option3= $_POST['opt_3'];
       $option4= $_POST['opt_4'];
       $options=[$option1,$option2,$option3,$option4];

       if(empty($_POST['ques'])){
            echo json_encode(array('error'=>'Question Field is Empty.','flag'=>'error'));
        }else if(empty($_POST['aid'])){
            echo json_encode(array('error'=>"Answer id is Empty",'flag'=>'error'));
        }else if(empty($_POST['qdept'])){
            echo json_encode(array('error'=>"Department is Empty",'flag'=>'error'));
        }else if(empty($_POST['opt_1'])){
            echo json_encode(array('error'=>"Option 1 id is Empty",'flag'=>'error'));
        }else if(empty($_POST['opt_2'])){
            echo json_encode(array('error'=>"Option 2 id is Empty",'flag'=>'error'));
        }else if(empty($_POST['opt_3'])){
            echo json_encode(array('error'=>"Option 3 id is Empty",'flag'=>'error'));
        }else if(empty($_POST['opt_4'])){
            echo json_encode(array('error'=>"Option 4 id is Empty",'flag'=>'error'));
        }else{
            $flag=false;
            $date=date('d-M-Y').' '.date('h-i-sa');
            $ques_query="INSERT INTO ques_tbl(question,ans_id,course_name,author,department,date) values('$ques',$ans_id,'$dept','$author','$dept','$date')";
            $ques_query_run=mysqli_query($con,$ques_query) or die("Ques query failed");
             if($ques_query_run){
                 $increment="UPDATE departments set total_ques=total_ques+1 where dept_name='$dept'";
                 mysqli_query($con,$increment);
                 $ind="SELECT MAX(qid) as qid from ques_tbl";
                 $run=mysqli_query($con,$ind) or die("Failed");
                 $res=mysqli_fetch_assoc($run);
                 $ques_num=(int) $res['qid'];
                 for($i=0; $i<4; $i++){
                     $ans_query="INSERT INTO ans_tbl(optionss,ans_id,course_name) values('$options[$i]',$ans_id,'$dept')";
                     $ans_query_run=mysqli_query($con,$ans_query) or die("Ans query failed");
                     if($ans_query_run){                     
                         $flag=true;
                     }else{
                         echo mysqli_error($con);
                     }
                 }
                 if($flag){
                     $incQues="UPDATE qnumber set total_ques=total_ques+1";
                         if(mysqli_query($con,$incQues)){
                            echo json_encode(array('success'=>"successfully inserted !!"));
                         }
                 }
            }
        }
         
    } 


?>
