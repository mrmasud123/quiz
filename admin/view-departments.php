<?php include 'header.inc.php'; ?>
    <!-- Header ends -->
   
    <div class="container-fluid teacher mt-5">
    <div class="container">
        <div class="row">
            <div class="tbl-container">
                <div class="head d-flex flex-column mb-5">
                    <div class="d-flex align-items-center justify-content-between">
                    <strong>All departments</strong>
                    <form action="add-dept-code.php" method="post">
                        <div class="form-group d-flex align-items-center">
                            <input class="form-control me-2" type="text" placeholder="Enter Department Name" name="dept_name" id="dept_name">
                            <button class="btn btn-primary" id="add" type="submit">Add</button>
                        </div>
                    </form>
                    </div>
                    
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            
                            <th>Department Name</th>
                            <th>Number of Question</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query="SELECT * from departments";
                            $run=mysqli_query($con,$query);
                            if(mysqli_num_rows($run)>0){
                                while($data=mysqli_fetch_assoc($run)){
                                    ?>

                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['dept_name']; ?></td>
                                    <td><?php echo $data['total_ques']; ?></td>
                                    <!-- <td>
                                        <form class="m-0" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                                            <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td> -->
                                </tr>

                        <?php
                                }
                            }
                        ?>
                        
                        
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- student ends -->
    <!--  -->
    <?php

        if(isset($_POST['delete'])){
            $delquery="DELETE from departments";
        }
?>
</body>
<script src="../js/jquery.js"></script>
<script>
    $(document).ready(function(){
        $userBtn=$('.useroption');
    $userInfo=$('.options');
    $userBtn.click(function(){
        $('.options').toggleClass("info");
    });

    
    });
    
</script>
</html>