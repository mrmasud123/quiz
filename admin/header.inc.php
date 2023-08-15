<?php
session_start();
include '../php_files/config.inc.php';
if(!isset($_SESSION['name'])){
    header("location:login-signup.php");
    
}
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
                        <a href="view-departments.php" class="nav-link bg-success ms-1 rounded text-light">Departments</a>
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