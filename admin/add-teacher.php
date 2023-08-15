<?php include 'header.inc.php'; ?>
    <!-- Header ends -->

<!-- add form starts -->
<div class="container-fluid all-items flex-column">
        <h1>Add Teacher Table</h1>
        <div class="container">
            <div class="row">
                <div class="form-container">
                    <form action="" method="post">
                        <div class="form-group mt-2">
                            <input id="name" type="text" placeholder="Enter Name" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <input id="email" type="email" placeholder="Enter E-mail" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <input id="password" type="password" placeholder="Enter Password" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <input id="institution" type="text" placeholder="Enter Institution" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                             <!--  -->
                             <select id="dept" name="dept" class="mb-3 form-control m-auto">
                            <option value="Select Type" selected disabled>Enter Department</option>
                            <?php
                            
                                $query="SELECT * from departments";
                                $result=mysqli_query($con,$query) or die("Department load failed");
                                if(mysqli_num_rows($result)>0){
                                    while($data=mysqli_fetch_assoc($result)){
                                        echo '<option value="'.$data['dept_name'].'">'.$data['dept_name'].'</option>';
                                    }
                                    } 
                            ?>
                        </select>
                                <!--  -->
                        </div>
                        <button class="mt-2 btn btn-primary" id="submit" type="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- add form ends -->
    <!--  -->
    <div class="message">
  <strong id="msg">Login failed</strong>
</div>
</body>
<script src="../js/jquery.js"></script>
<script>
    $(document).ready(function(){
        $userBtn=$('.useroption');
    $userInfo=$('.options');
    $userBtn.click(function(){
        $('.options').toggleClass("info");
    });
    function mes($ms,$bg,$sh){
                $("#msg").text($ms);
                $(".message").css("display",$sh);
                $(".message").css("backgroundColor",$bg);
                $(".message").css("color","white");
                setTimeout(() => {
                  $("#msg").text("");
                  $(".message").css("display","none");
                 
                }, 2000);
    }
    $("#submit").click(function(e){
        e.preventDefault();
        $email = $('#email').val();
        $password = $('#password').val();
        $name = $('#name').val();
        $dept = $('#dept').val();
        $institution = $('#institution').val();
       
          $.ajax({
            url:'add-teacher-code.php',
            method:'post',
            dataType:'json',
            data:{email:$email,password:$password,dept:$dept,institution:$institution,name:$name},
            success:function(data){
              $res=data;
              
              if(data.flag=='error'){
                mes(data.error,"red","block");
              }else{
                console.log($res.success);
                mes($res.success,"green","block");
                location.href="teachers.php";
              }            
            }
          })
        /* } */
    });

    
    });
</script>
</html>