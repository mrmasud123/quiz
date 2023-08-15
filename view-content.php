<?php include 'header.inc.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                    <div class="col-8">
                        <?php 
                            
                            $email=$_SESSION['email'];
                            $query="SELECT * from tutorials where email='$email' order by id desc";
                            $res=mysqli_query($con,$query);

                            while($data=mysqli_fetch_assoc($res)){
                           
                        ?>

                        <article class="m-3 d-flex justify-content-center flex-column">
                            <h4 class="fw-bold"><?php echo $data['title']; ?></h4>
                            <span class="fw-bold"><?php echo $data['author_name']; ?></span>
                            <span><?php echo $data['course_name']; ?></span>
                            <span><?php echo $data['upload_date']; ?></span>
                            <div>
                                <button class="btn btn-danger"><a href="delete-tutorial.php?id=<?php echo $data['id'] ?>" class="nav-link">Delete?</a></button>
                                <button class="btn btn-primary"><a href="edit-tutorial.php" class="nav-link">Edit?</a></button>
                            </div>
                            <div class="mb-3 materials d-flex justify-content-between align-items-center ">
                                <video controls muted height="250px" width="400px">
                                    <source type="video/mp4" src="assets/user_upload/<?php echo $data['video_link']; ?>">
                                </video>
                                <object data="assets/user_upload/materials/<?php echo $data['materials']; ?>" type="application/pdf" width="250px" height="250px">
                                </object>
                            </div>
                            <div class="desc">
                                <?php echo $data['description']; ?>
                            </div>
                            
                        </article>

                        <?php
                            }
                        ?>
                        
                        
                    </div>
                
            </div>
        </div>
    </div>

    <!--  -->
    <?php include 'footer.inc.php'; ?>