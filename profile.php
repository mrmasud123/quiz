<?php include 'header.inc.php'; ?>

    <!-- profile starts-->
    <div class="container mt-5 mb-5">
        <div class="row d-flex align-items-center justify-content-center">
         <!--    <div class="col "> -->
                <div class="col-8 ">
                    <div class="user-info d-flex flex-column">
                        <div class="user d-flex align-items-center mb-3">
                        <?php
                       
                            $logged_email=$_SESSION['email'];
                            $logged_user=$_SESSION['role'];
                            if($logged_user=="student"){
                                $quer="SELECT img_path from users where email='$logged_email'";
                                
                            }else{
                                $quer="SELECT img_path from teachers where email='$logged_email'";
                                
                            }
                                $res=mysqli_query($con,$quer);
                                $path=mysqli_fetch_assoc($res)['img_path'];
                                if($path==NULL){
                                    echo "Hello ".$_SESSION['name']." Upload an image";
                                }else{
                                    echo '
                                    <img style="width: 100px;height: 100px;border-radius:50%" src="assets/user_upload/'.$path.'" >
                                    <h1 class="ms-3 display-5 fw-bold">'.$_SESSION['name'].'</h1>';
                                }  
                        ?>   
                        </div>
                        <div class="changeImg">
                            <form action="profile-change.php" method="post" enctype="multipart/form-data">
                                <label for="" class="form-label">Change profile photo?</label>
                                <input accept=".png , .jpg" id="chngImg" name="chngImg" type="file" placeholder="Choose image" class="w-50 form-control">
                                <button type="submit" id="submit" class="mt-2 btn btn-success">Change?</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                    <div class="quiz-info d-flex align-items-center justify-content-between flex-column">
                        <?php  
                        include 'php_files/config.inc.php'; 
                        if($logged_user=="student"){

                        $getQNum="SELECT * from result where email='$logged_email' order by id desc";
                            $run_num=mysqli_query($con,$getQNum);
                            $qnumber=mysqli_num_rows($run_num);
                            echo "<h2 class='fw-bold'>You have participated in total : ".$qnumber." quizes</h2> <table class='mt-3 table table-striped'>";
                            while($data=mysqli_fetch_assoc($run_num)){ 
                            ?>
                            
                                <tr>
                                    <td>
                                         <?php echo "<b>Department :</b>". $data['student_department'] ?>
                                    </td>
                                    <td>
                                        <?php echo  "<b>Obtained : </b>".$data['mark'] . " Out of ". $data['out_of']?>
                                    </td>
                                    <td>
                                        <?php echo  "<b>Participation Time : </b>".$data['date_time'] ?>
                                    </td>
                                </tr>
                          
                    <?php
                            }
                            echo '  </table>
                            </div>';
                            
                        }else{
                            $logged_id=$_SESSION['id'];
                            $NumOfQ="SELECT COUNT(author_name) as num from tutorials where email='$logged_email'";
                            $added_ques="SELECT COUNT(author) as total_ques from ques_tbl where author='$logged_email'";
                            $total_ques=mysqli_fetch_assoc(mysqli_query($con,$added_ques))['total_ques'];
                            $data=mysqli_fetch_assoc(mysqli_query($con,$NumOfQ))['num'];
                            ?>
                            <div class="rounded mb-4 p-3 col-4 bg-secondary d-flex align-items-center flex-column">
                                <input type="text" class="w-50 text-center form-control" readonly disabled value=<?php echo $total_ques; ?>>
                                <div class="mt-3 w-100 bottom d-flex align-items-center justify-content-center flex-wrap">
                                    <button class="p-1 m-1 btn btn-primary"><a class="nav-link" href="php_files/questions.php?id=<?php echo $logged_id; ?>">View?</a></button>
                                    
                                    <button class="m-1 btn btn-info p-1"><a class="nav-link" href="teacher-ques-add.php">Add Question?</a></button>
                                </div>
                            </div>
                            <div class="rounded p-3 col-4 bg-danger d-flex align-items-center flex-column">
                                <input type="text" class="w-50 text-center form-control" readonly disabled value=<?php echo $data; ?>>
                                <div class="mt-3 w-100 bottom d-flex align-items-center justify-content-center flex-wrap">
                                    <button class="m-1 btn btn-primary"><a class="nav-link" href="view-content.php?id=<?php echo $logged_id; ?>">View?</a></button>
                                    <button class="m-1 btn btn-info"><a class="nav-link" href="add-content.php">Add Content?</a></button>
                                </div>
                            </div>
                    <?php
                        }   
                    ?>

                </div>
            </div>
       <!--  </div> -->
    </div>
    <!-- profile ends -->
    <?php include 'footer.inc.php'; ?>