<?php
$t_dept=$_SESSION['speciality'];

 ?>
    <div class="container-fluid mt-5">
    <div class="row">
        <div class="col">
        <div class="col-8 m-auto d-flex align-items-center justify-content-between flex-column">
            <h3>Add Questions</h3>
            <!--  --><!-- <form action="add-ques-code.php" class="w-75 text-center" method="POST"> -->
            <form action="" class="w-75 text-center" method="POST">
                <div class="form-group mb-3">
                    <input id="ques" type="text" placeholder="Enter question" name='ques' class="form-control">
                </div>
                <div class="form-group mb-3">
                    <input id="ans_id_check" type="text" placeholder="Enter the answer id" class="form-control" name="ans_id">
                    <b id="ans-range" class="text-danger"></b>
                </div>
                <div class="form-group mb-3">
                    <!--  -->
                    <select id="qdept" name="qdept" class="mb-3 form-control  m-auto">
                            <option value="Select Type" selected disabled>Enter Department</option>
                            <?php
                                include 'config.inc.php';
                                $query="SELECT * from departments";
                                $result=mysqli_query($con,$query) or die("Department load failed");
                                if(mysqli_num_rows($result)>0){
                                    while($data=mysqli_fetch_assoc($result)){
                                       
                                        if($t_dept==$data['dept_name']){
                                            echo '<option class="bg-info" value="'.$data['dept_name'].'">'.$data['dept_name'].'</option>';
                                        }else{
                                            echo '<option disabled value="'.$data['dept_name'].'">'.$data['dept_name'].'</option>';
                                        }
                                    }
                                    } 
                            ?>
                    </select>
                                <!--  -->                    
                </div>
                <div class="form-group mb-3">
                    <input id="opt_1" type="text" placeholder="Enter option 1" name="option1" class="form-control mb-2">
                    <input id="opt_2" type="text" placeholder="Enter option 2" name="option2" class="form-control mb-2">
                    <input id="opt_3" type="text" placeholder="Enter option 3" name="option3" class="form-control mb-2">
                    <input id="opt_4" type="text" placeholder="Enter option 4" name="option4" class="form-control mb-2">
                </div>
                <a href="#"><button id="submitBtn" class="btn btn-success" type="submit" name="submit">Submit</button></a>
            </form>
        </div>
        </div>
    </div>
    
</div>