<?php include 'header.inc.php'; ?>

    <div class="container d-flex align-items-center justify-content-center">
    <div class="col-6">
        
        <div class="all-ques">
            <form action="checkans.php" method="post">
                <div class="form-group">
                <?php
                    $dept_id=$_GET['id'];
                    
                    $query="SELECT dept_name from departments where id=$dept_id";
                    $result=mysqli_query($con,$query);
                    $data=mysqli_fetch_assoc($result);
                    $course=$data['dept_name'];
                    $quesquery="SELECT * from ques_tbl where course_name='$course'";
                    $result1=mysqli_query($con,$quesquery);
                    echo '<h1 class="display-3 text-capitalize font-weight-bold">'.$course.'</h1>';
                    while($data1=mysqli_fetch_assoc($result1)){
                        echo '<h4 class="text-capitalize font-weight-bold mb-3">'.$data1['question'].'</h4>';
                        
                        $id=$data1['ans_id'];
                        $ansquery="SELECT * from ans_tbl where ans_id=$id";
                        $result2=mysqli_query($con,$ansquery);
                        while($data2=mysqli_fetch_assoc($result2)){

                            echo '
                            
                            <div class="option d-flex align-items-center ">
                                    <input type="radio" class="mr-2" name=check['.$data2['ans_id'].'] value="'.$data2['aid'].'">
                                    <input hidden type="text" name="dept" class="mr-2" value='.$dept_id.'>
                                    <h6>'.$data2['optionss'].'</h6>
                            </div>
                            ';
                        }
                    }              
                                
                            echo '
                            </div>
                                <button class="btn btn-success" type="submit">Submit Answer</button>
                            </form>
                            ';
        ?>
        </div>
    </div>
</div>

<?php include 'footer.inc.php'; ?>