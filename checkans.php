<?php
session_start();
if(isset($_SESSION['name'])){
    $stud_name=$_SESSION['name'];
}else{
    $stud_name="";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MR quiz</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Header starts -->
    <div class="container-fluid p-3" id="header">
        <div class="row">
            <div class="col">
            <div class="col-12 d-flex align-items-center justify-content-evenly">
                <div class="col-3">
                    <a href="#" class="text-decoration-none text-light fw-bold display-6">MR Quiz.</a>
                </div>
                <div class="col-6">
                    <nav class="nav">
                        <a href="index.php" class="nav-link bg-success ms-1 rounded text-light">Home</a>
                        <a href="about.php" class="nav-link bg-success ms-1 rounded text-light">About us</a>
                        <a href="teacher-list.php" class="nav-link bg-success ms-1 rounded text-light">Our teachers</a>
                        <a href="tutorial.php" class="nav-link bg-success ms-1 rounded text-light">Tutorial</a>
                        <a href="materials.php" class="nav-link bg-success ms-1 rounded text-light">Study materials</a>
                    </nav>
                </div>
                <div class="col-3 d-flex align-items-center" style="justify-content: right;">
                    <?php
                        
                        if(isset($_SESSION['name'])){
                            echo '
                            <div class="login-info">
                                <button class="btn btn-primary useroption">
                                    <span class="fw-bold">Hello '.$_SESSION['name'].'</span>
                                </button>
                            </div>
                            <div class="options bg-success rounded mt-1 mb-1 pt-2 pb-2">
                                <img src="assets/about.jpg" alt="">
                                <a href="profile.php?id='.$_SESSION['id'].'" class="nav-link bg-info ms-1 rounded text-light mt-1 p-2 mb-2">View profile</a>
                                <a href="logout.php" class="nav-link bg-danger ms-1 rounded text-light  p-2">Logout</a>
                            </div>
                            
                            ';
                        }else{
                            echo '<button class="btn btn-info"><a href="login.php">Login</a></button>';
                        }
                    ?>
                    

                    
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Header ends -->

    <div class="container d-flex align-items-center justify-content-center mt-5">
    <div class="col-6">
 <?php
            //error_reporting(0);

            if(empty($_POST['check'])){
                echo "<h1 class='display-5 text-dark'>Please select the answers</h1>";
            }else{
                include 'php_files/config.inc.php';
                $checked=array_values($_POST['check']);
                $dept_id=$_POST['dept'];
                $totalAnswered=count($_POST['check']);
                
                //$con=mysqli_connect("localhost","root","","quizz") or die("Connection failed");

                $getDept="SELECT * from departments where id=$dept_id";
                $deptRun=mysqli_query($con,$getDept);
                $fetch=mysqli_fetch_assoc($deptRun);
                $dept=$fetch['dept_name'];
                $getQNum="SELECT COUNT(course_name) as num from ques_tbl where course_name='$dept'";
                $qnumber=mysqli_fetch_assoc(mysqli_query($con,$getQNum))['num'];
                
                echo "
                <h1 class='text-capitalize font-weight-bold'>". $dept. "</h1>
                <h3 class='text-capitalize'>Total answered : ". $totalAnswered. " Out of : ".$qnumber ."</h3><br>";
                
                echo "<br>";
                $query="SELECT * from ques_tbl where course_name='$dept'";
                $run=mysqli_query($con,$query) or die("Query failed".mysqli_error($con));
                $result=0;
                $i=0;
                while($data=mysqli_fetch_assoc($run)){
                    
                    $check=$data['ans_id']==$checked[$i];
                    if($check){
                        $result++;
                    }
                    $i++;
                }
                
                echo "<h3 class='text-capitalize'> Correct: ".$result."</h3><br>";
                echo '<button class="btn btn-success"><a href="index.php" class="nav-link">Go to home</a></button>';
              
                $time=date('Y/m/d-H:i:s');
                $mail=$_SESSION['email'];
                $insert="INSERT into result(student_name, student_department, mark,out_of, date_time,email) VALUES ('$stud_name','$dept','$result','$qnumber','$time','$mail')";
                $insertQuery=mysqli_query($con,$insert) or die("INsertion failed". mysqli_error($con));
                if($insertQuery){
                    return 1;
                }
                }

?>

</div>
</div>


    <!--  -->


    <?php include 'footer.inc.php'; ?>
