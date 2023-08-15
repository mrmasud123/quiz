<?php
    session_start();
    if(isset($_SESSION['name'])){
                $ans_id=$_POST['id'];
        
                include '../php_files/config.inc.php';
                $get_last_ques_id="SELECT total_ques from qnumber";
                $res=mysqli_query($con,$get_last_ques_id);
                
                $run_last_id=mysqli_fetch_assoc($res);
                $last_id=$run_last_id['total_ques'];
             
                $from=($last_id*4)+1;
                $to=$from+3;
                    $flag=true;
                    for($a=$from; $a<=$to; $a++){
                        if($ans_id==$a){
                            $flag=true;
                            break;
                        }else{
                            $flag=false; 
                            
                        }
                    }
                        if($flag){
                            echo json_encode(array("flag"=>"success","msg"=>"You can proceed"));
                        }else{
                            echo json_encode(array("flag"=>"error","msg"=>"Insert number between: ".$from ." and ".$to));
                        }
                
        }


?>