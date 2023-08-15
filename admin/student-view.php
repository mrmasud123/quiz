

<?php 
    include 'header.inc.php';
    if(isset($_SESSION['name'])){
        $st_id=$_GET['id'];
    }else{
        $st_id=0;
    }
?>
    <!-- Header ends -->
   
    <div class="student-view-container w-50 m-auto">
                    <div class="head d-flex flex-column mb-5">
                        <strong class="text-capitalize ">Masud's Information</strong>
                    </div>
                    <div class="student-view">
                    <?php
                            
                            $query="SELECT * from users where id=$st_id";
                            $run=mysqli_query($con,$query);
                            if(mysqli_num_rows($run)>0){
                                $data=mysqli_fetch_assoc($run)
                                    ?>
                        <table class="table table-striped">
                            <tr class="d-flex align-items-center justify-content-between">
                                <td>Name : </td>
                                <td><?php echo $data['name']; ?></td>
                            </tr>
                            <tr class="d-flex align-items-center justify-content-between">
                                <td>Email : </td>
                                <td><?php echo $data['email']; ?></td>
                            </tr>
                            <tr class="d-flex align-items-center justify-content-between">
                                <td>Institution : </td>
                                <td><?php echo $data['institution']; ?></td>
                            </tr>
                            <tr class="d-flex align-items-center justify-content-between">
                                <td>Department : </td>
                                <td><?php echo $data['department']; ?></td>
                            </tr>
                            <tr class="d-flex align-items-center justify-content-between">
                                <td>Number of quiz attempts : </td>
                                <?php
                                /* fgfgfgdg */
                                    include '../php_files/config.inc.php';
                                    $mail=$data['email'];
                                    $get_last_ques_id="SELECT * from result where email='$mail'";
                                    
                                    $run_last_id=mysqli_query($con,$get_last_ques_id);
                                    $number_of_quiz=mysqli_num_rows($run_last_id);
                                    ?>
                                        <td><?php echo $number_of_quiz ?></td>
                                        </tr>

                                </table>
                        

                        <table class="table table-striped">
                                    <?php
                                    while($data=mysqli_fetch_assoc($run_last_id)){

                                        ?>
                            <tr>
                                <td><?php echo $data['student_department'] ?></td>
                                <td><?php echo $data['mark'] ." Out of : " . $data['out_of'] ?></td>
                                <td>Participated: <?php echo $data['date_time'] ?></td>
                            </tr>


                                        <?php
                                    }
                                    
                                   
                                ?>
                               
                            
                            
                                                        
                        </table>
                    </div>                        
                </div>
                <?php
                                
                            }
                        ?>
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