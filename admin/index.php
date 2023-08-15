<?php include 'header.inc.php'; ?>
    <div class="container-fluid all-items">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex align-items-center justify-content-between flex-wrap">
                        <div class="p-3 box col-3 d-flex align-items-center justify-content-center flex-column bg-primary"  id="user">
                            <h4><a class="nav-link" href="students.php">Total Students</a></h4>
                            <strong class="user-num">
                                <?php
                                    /* session_start(); */
                                    
                                        
                                        $query="SELECT * from users";
                                        $result=mysqli_query($con,$query);
                                        echo mysqli_num_rows($result);
                                   
                                ?>
                            </strong>
                        </div>
                    <div class="p-3 box col-3 d-flex align-items-center justify-content-center flex-column bg-warning">
                        <h4><a class="nav-link" href="teachers.php">Total Teachers</a></h4>
                        <strong class="teacher-num">
                            <?php
                            $tquery="SELECT * from teachers";
                            $tresult=mysqli_query($con,$tquery);
                            echo mysqli_num_rows($tresult);
                            ?>
                        </strong>
                    </div>
                    <div class="p-3 box col-3 d-flex align-items-center justify-content-center flex-column bg-secondary">
                        <h4 class="text-center"><a class="nav-link" href="view-departments.php">Total Department</a></h4>
                        <strong class="courses-num">
                            <?php
                            $dquery="SELECT * from departments";
                            $dresult=mysqli_query($con,$dquery);
                            echo mysqli_num_rows($dresult);
                            ?>
                        </strong>
                    </div>
                    
                    
                        <div id="pending" class="p-3 box col-3 d-flex align-items-center justify-content-center flex-column bg-warning">
                        <h4 class="text-center"><a class="nav-link" href="view-pending-teacher.php">Teacher Application</a></h4>
                        <strong class="teacher-num">
                            <?php
                            $tquery="SELECT * from pending_teacher";
                            $tresult=mysqli_query($con,$tquery);
                            echo mysqli_num_rows($tresult);
                            ?>
                        </strong>
                    </div>
                    
                </div>
            </div>
        </div>
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