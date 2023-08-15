<?php include 'header.inc.php'; ?>
    <!-- Header ends -->
   
    <div class="container-fluid teacher mt-5">
        <div class="container">
            <div class="row">
                <div class="tbl-container">
                    <div class="head d-flex flex-column mb-5">
                        <strong>Teacher Table</strong>
                        <a href="add-teacher.php"><button class="btn btn-primary">Add Teacher</button></a>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Speciality</th>
                                <th>Institution</th>
                                <th>Password</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if(isset($_SESSION['name'])){
                                $data;
                                
                                $query="SELECT * from teachers";
                                $result=mysqli_query($con,$query) or die('Query failed');
                                if(mysqli_num_rows($result)>0){ 
                                    while($data=mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><?php echo $data['email']; ?></td>
                                <td><?php echo $data['speciality']; ?></td>
                                <td><?php echo $data['institution']; ?></td>
                                <td><?php echo $data['password']; ?></td>
                                <td>
                                    <button class="btn btn-success"><a class="nav-link" href="update-teacher.php?id=<?php echo $data['id']; ?>">Edit</a></button> <button class="btn btn-danger"><a class="nav-link"  href="delete-teacher.php?id=<?php echo $data['id']; ?>">Delete</a></button>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            }
                        ?> 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- all teacher list ends -->

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