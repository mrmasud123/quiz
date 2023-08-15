<?php include 'header.inc.php'; ?>
    <!-- Header ends -->

    <div class="container-fluid">
    <!-- <div class="container w-100"> -->
    <div class="row">
        <div class="col-12">
            <h3>All Questions</h3>
            <a href="add-question.php"><button class="btn btn-primary mb-3">Add Questions?</button></a>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>S.NO</th>
                        <th>Author Name</th>
                        <th>Department</th>
                        <th>Question</th>
                        <th>Answer Id</th>
                        <th>Added Date</th>
                        <th>Options</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $query="SELECT * from ques_tbl";
                    $runquery=mysqli_query($con,$query);
                    
                    if(mysqli_num_rows($runquery)>0){
                          
                                while($question=mysqli_fetch_assoc($runquery)){
                                    
                                    $qid=$question['ans_id'];
                                    ?>
                                    <tr>
                                        <td><?php echo $question['qid']; ?></td>
                                        <td><?php echo $question['author']; ?></td>
                                        <td><?php echo $question['course_name']; ?></td>
                                        <td><?php echo $question['question']; ?></td>
                                        <td><?php echo $question['ans_id']; ?></td>
                                        <td><?php echo $question['date']; ?></td>
                                        
                                        <td class="d-flex  flex-column">
                                    <?php
                                        $ansquery="SELECT * from ans_tbl where ans_id=$qid";
                                        $runans=mysqli_query($con,$ansquery);
                                        while($answers=mysqli_fetch_assoc($runans)){
                                    ?>
                                    <span>
                                        <?php echo $answers['aid'].".".$answers['optionss']?> 
                                    </span>
                                    <?php 
                                    }
                                    echo '</td>
                                            <td><a href="delete-question.php?id='.$question['qid'].'"><button class="btn btn-danger">Delete?</button></a></td>
                                        </tr>';
                                }
                            
                        }
                    
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--  </div> -->
</div>
    <!--  -->
    
</body>
<script src="../js/jquery.js"></script>
<script>
    $userBtn=$('.useroption');
    $userInfo=$('.options');
    $userBtn.click(function(){
        $('.options').toggleClass("info");
    });
</script>
</html>