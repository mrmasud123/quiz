<?php include 'header.inc.php'; ?>
    <!-- Header ends -->
   
    <div class="container-fluid teacher mt-5">
    <div class="container">
        <div class="row">
            <div class="tbl-container">
                <div class="head d-flex flex-column mb-5">
                    <strong>Pending teacher application Table</strong>
                </div>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.NO</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Institution</th>
                            <th>E-mail</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            
                            $query="SELECT * from pending_teacher";
                            $run=mysqli_query($con,$query);
                            if(mysqli_num_rows($run)>0){
                                while($data=mysqli_fetch_assoc($run)){
                                    ?>

                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['t_name']; ?></td>
                                    <td><?php echo $data['institution']; ?></td>
                                    <td><?php echo $data['department']; ?></td>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><?php echo $data['password']; ?></td>
                                    <td>
                                        <a href="#"><button class="btn btn-danger">Delete</button></a>
                                        <a href="approve.php?id=<?php echo $data['id'] ?>"><button class="btn btn-primary">Approve?</button></a>
                                    </td>
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