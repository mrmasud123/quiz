<?php
session_start();
if(!isset($_SESSION['id'])){
    
    header("location: newLearn/first.php");
}
include 'php_files/config.inc.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy To Learn</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="assets/icons.png" type="image/x-icon">
</head>
<body>

    <!-- Header starts -->
    <div class="container-fluid p-3" id="header">
        <div class="row">
            <div class="col">
            <div class="col-12 d-flex align-items-center justify-content-evenly">
                <div class="col-2">
                    <a href="index.php" class="">
                        <img class="rounded img-fluid w-75" src="assets/easy.png" alt="">
                    </a>
                </div>
                <div class="col-6">
                    <nav class="nav">
                        <a href="index.php" class="nav-link bg-success ms-1 rounded text-light">Home</a>
                        <a href="teacher-list.php" class="nav-link bg-success ms-1 rounded text-light">Our teachers</a>
                        <a href="tutorial.php" class="nav-link bg-success ms-1 rounded text-light">Tutorial</a>
                        <a href="materials.php" class="nav-link bg-success ms-1 rounded text-light">Study materials</a>
                    </nav>
                </div>
                <div class="col-3 d-flex align-items-center" style="justify-content: right;">
                    <?php
                    $logged_id=$_SESSION['id'];
                    $logged_role=$_SESSION['role'];
                    if($logged_role=="student"){

                        $img="SELECT img_path from users where id=$logged_id";
                    }else{
                        $img="SELECT img_path from teachers where id=$logged_id";
                    }
                    $runImg=mysqli_fetch_assoc(mysqli_query($con,$img));
                    $path=$runImg['img_path'];
                        if(isset($_SESSION['name'])){
                            echo '
                            <div class="login-info">
                                <button class="btn btn-primary useroption">
                                    <span class="fw-bold">Hello '.$_SESSION['name'].'</span>
                                </button>
                            </div>
                            <div class="options bg-success rounded mt-1 mb-1 pt-2 pb-2">
                                <img src="assets/user_upload/'.$path.'" alt="">
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