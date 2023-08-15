<?php include 'header.inc.php'; ?>
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
<?php include 'footer.inc.php'; ?>