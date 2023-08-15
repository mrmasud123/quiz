<?php include 'header.inc.php'; ?>
<!-- sections starts -->
<div class="container-fluid content">
    <div class="row">
        <div class="col d-flex align-items-center flex-column ">
            <?php
                if($_SESSION['role']=="student"){
            ?>
            <h1 class="display-5 fw-bold text-light">Get Examined By Our Experienced Teacher?</h1>
            <div>
                <span class="fw-bold text-light" style="font-size: 40px;">Our courses : </span>
            <span class="fw-bold" style="font-size: 40px;color:chartreuse" id="course"></span>
            </div>
            <div class="mt-3 quiz p-4 bg-success rounded w-50 d-flex align-items-center flex-column">
                <h1 class="fw-bold text-light">Let's justify your skills</h1>
                <button class="btn btn-primary"><a href="quiz.php" class="nav-link text-light">Enter quiz</a></button>
            </div>
            <?php
                }else {
                ?>
                <h1 class="display-5 fw-bold text-light">Want to become a effective mentor?</h1>
                <div>  
                </div>
                <div class="mt-3 quiz p-4 bg-success rounded w-50 d-flex align-items-center flex-column">
                    <h1 class="fw-bold text-light">Let's join us</h1>
                    <!-- <button class="btn btn-primary"><a href="apply.php" class="nav-link text-light">Apply?</a></button> -->
                </div>
                <?php

                }
            ?>
            
            
        </div>
    </div>
</div>
<!-- sections ends -->
<div class="container mb-2 p-2 mt-2">
    <div class="row">
        <h1 class="fw-bold mb-2 mt-2 text-center">Our Tutorial</h1>
        <div class="col-12 d-flex align-items-center justify-content-between flex-wrap">

        <?php
        
            $query="SELECT * from tutorials";
            $run=mysqli_query($con,$query) or die("Tutorial query failed");
            if(mysqli_num_rows($run)>0){
                while($data=mysqli_fetch_assoc($run)){
                   
                ?>

            <div class="m-2 col-3 card">
                <div class="card-header d-flex align-items-center ">
                    <img src="assets/<?php echo $data['author_img'] ?>" class="rounded">
                    <div class="info ms-2 d-flex align-items-center flex-column">
                        <strong><?php echo $data['author_name'] ?></strong> 
                        <p class="m-0"><?php echo $data['course_name'] ?></p>
                        <span><?php echo $data['upload_date'] ?></span>
                    </div>
                </div>
                <div class="card-body">
        
                    <video muted controls width="250px" height="250px">
                        <source src="assets/user_upload/<?php echo $data['video_link'] ?>" type="video/mp4">
                    </video>
                </div>
            </div>
        <?php
                }
            }

        ?>
        </div>
    </div>
</div>
<!-- materials -->
<div class="container">
    <div class="row">

        <h1 class="fw-bold mb-2 mt-2 text-center">Study Materials</h1>
        <div class="col-12 d-flex align-items-center justify-content-between">
        <?php
        
            $query="SELECT course_name,materials from tutorials";
            $run=mysqli_query($con,$query) or die("Tutorial query failed");
            if(mysqli_num_rows($run)>0){
                while($data=mysqli_fetch_assoc($run)){
                   if(empty($data['materials'])){
                        break;
                   }else{
                    ?>

                        <div class="m-2 col-3 card">
                            <div class="card-header text-center">
                                <strong><a href="assets/<?php echo $data['materials'] ?>" class="text-decoration-underline nav-link" target="_blank"><?php echo $data['materials'] ?></a></strong>
                                <p class="m-0"><?php echo $data['course_name'] ?></p>
                            </div>
                            <div class="card-body">
                                <center>
                                    <object data="assets/user_upload/materials/<?php echo $data['materials'] ?>" type="application/pdf" width="250px" height="250px">
                                    </object>
                                </center>
                            </div>
                        </div>


                    <?php
                   }
                
                }
            }

        ?>
            
            
           
        </div>
    </div>
</div>


<?php include 'footer.inc.php'; ?>