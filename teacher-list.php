<?php include 'header.inc.php'; ?>
    <!-- Teacher section -->
    <div class="container mt-5 mb-5">
        <h1 class="fw-bold text-center display-3">Teachers Section</h1>
        <div class="row">
            <div class="col-6">

            </div>
        </div>
    </div>
<!-- sections starts -->
<center>
<div class="owl-carousel owl-theme">
<?php
            
            $query="SELECT * from teachers";
            $run=mysqli_query($con,$query) or die("Tutorial query failed");
            if(mysqli_num_rows($run)>0){
                while($data=mysqli_fetch_assoc($run)){
            ?>

    <div class="container1">
                    
        <div class="d-flex align-items-center justify-content-center flex-column">
            <img src="assets/user_upload/<?php echo $data['img_path']; ?>" alt="About-image" class="rounded img-fluid">
            <h3><?php echo $data['name']; ?></h3>
            <span>Speciality : <?php echo $data['speciality']; ?></span>
            <p>Teacher at : <?php echo $data['institution'] ?></p>
        </div>
       
    </div>

<?php
                }
            }
?>
</div>
</center>


<!-- sections ends -->
<div class="container mb-2 p-2 mt-2">
    <div class="row">
        <h1 class="fw-bold mb-2 mt-2 text-center">Our tutorials</h1>
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





    <script src="js/jquery.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function(){
            $userBtn=$('.useroption');
            $userInfo=$('.options');
            $userBtn.click(function(){
                $('.options').toggleClass("info");
            });
            $('.owl-carousel').owlCarousel({
            //loop:true,
            margin:10,
            nav:true,
            responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:5
            }
            }
        })
        });
    </script>
</body>
</html>