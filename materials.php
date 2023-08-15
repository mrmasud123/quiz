<?php include 'header.inc.php'; ?>

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