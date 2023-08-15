<?php
session_start();
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MR quiz</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
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
                        <a href="index.php" class="nav-link bg-success ms-1 rounded text-light">Dashboard</a>
                        <a href="teachers.php" class="nav-link bg-success ms-1 rounded text-light">Teacher</a>
                        <a href="students.php" class="nav-link bg-success ms-1 rounded text-light">Students</a>
                        <a href="questions.php" class="nav-link bg-success ms-1 rounded text-light">Questions</a>
                        <a href="departments.php" class="nav-link bg-success ms-1 rounded text-light">Departments</a>
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
                                <img src="../assets/about.jpg" alt="">
                                <a href="logout.php" class="nav-link bg-danger ms-1 rounded text-light  p-2">Logout</a>
                            </div>
                            
                            ';
                        }else{
                            echo '<button class="btn btn-info"><a href="login-signup.php">Login</a></button>';
                        }
                    ?> 
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- Header ends -->

    <div class="container-fluid">
    <!-- <div class="container w-100"> -->
    <div class="row">
        <div class="col-12">
            <h3>All Questions</h3>
            <a href="../teacher-ques-add.php"><button class="btn btn-primary mb-3">Add Questions?</button></a>
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
                    $logged_email=$_SESSION['email'];
                    include '../php_files/config.inc.php';
                    $query="SELECT * from ques_tbl where author='$logged_email'";
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