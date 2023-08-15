<?php include 'header.inc.php'; ?>
    <div class="container mt-5">
        <div class="quiz-img">
            <img src="assets/img.png" alt="quiz">
        </div>
        <div class="row">
            <h1 class="text-center text-capitalize text-dark">available Courses</h1>
            <div class="col-12 d-flex align-items-center justify-content-center">
                <section class="col-6">
                    <table class="mt-3 mb-3 table table-striped">
                    <?php
                       
                        $query="SELECT * from departments";
                        $run=mysqli_query($con,$query) or die("Department query failed");
                        if(mysqli_num_rows($run)>0){
                        while($data=mysqli_fetch_assoc($run)){
                   
                ?>
                        <tr>
                            <td class="fw-bold text-center"><?php echo $data['dept_name'] ?></td>
                            <td class="text-center"><button class="btn btn-success"><a class="nav-link" href="quiz-question.php?id=<?php echo $data['id'] ?>">Enter?</a></button></td>
                        </tr>
                        <?php
                }
            }

        ?>
                    </table>
                </section>
            </div>
        </div>
    </div>


    <?php include 'footer.inc.php'; ?>