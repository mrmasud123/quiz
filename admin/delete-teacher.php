<?php
include '../php_files/config.inc.php';

$teacher_id=$_GET['id'];

$emailquery="SELECT email from teachers where id=$teacher_id";
$data=mysqli_fetch_assoc(mysqli_query($con,$emailquery))['email'];
$t_delete="DELETE from teachers where id=$teacher_id";
if(mysqli_query($con,$t_delete)){
        $delquery="SELECT ans_id from ques_tbl where author='$data'";
        $res=mysqli_query($con,$delquery);
        $tutDelete="DELETE from tutorials where email='$data'";
        mysqli_query($con,$tutDelete);
        if(mysqli_num_rows($res)>0){
                while($email=mysqli_fetch_assoc($res)){
                        $id=$email['ans_id'];
                        $ans_tbl_info="SELECT ans_id as ad from ans_tbl where ans_id=$id";
                        $run=mysqli_query($con,$ans_tbl_info);
                        while($info=mysqli_fetch_assoc($run)){
                                $delques="DELETE from ques_tbl where author='$data'";
                                $delans="DELETE from ans_tbl where ans_id=$id";
                                if(mysqli_query($con,$delques)){
                                        if(mysqli_query($con,$delans)){
                                                $tutDelete="DELETE from tutorials where email='$data'";
                                                if(mysqli_query($con,$tutDelete)){
                                                        header("location: teachers.php");
                                                }
                                        }
                                }
                        }
                }

        }else{
                header("location:teachers.php");
        }
}
        

?>