<?php

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MR quiz</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 <!-- Header starts -->
<h1 class="display-3 fw-bold text-center">Welcome to teacher application</h1>
   <!-- quizbody starts -->
   <div class="container-fluid mt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="col-4 m-auto">
                        <form action="" method="POST" >
                            <div class="form-group text-center">
                                <input id="name" type="text" placeholder="Enter your name" class="form-control mb-3 w-75 m-auto" name="name">
                                <input id="email" type="text"  placeholder="Enter your email" class="form-control mb-3 w-75 m-auto" name="email">
                                <input id="password" type="password" placeholder="Enter your password" class="form-control mb-3 w-75 m-auto" name="password">
                                <input id="institution" type="text" placeholder="Enter your current institution" class=" mb-3 form-control w-75 m-auto" name="institution">
                                
                                <!--  -->
                                <select id="dept" name="dept" class="mb-3 form-control w-75 m-auto">
                            <option value="Select Type" selected disabled>Enter Department</option>
                            <?php
                            include 'php_files/config.inc.php';
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
                                <button class="btn btn-warning" id="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="message">
  <strong id="msg">Login failed</strong>
</div>
    <script src="js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            console.log("Jquery");
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
        $institution = $('#institution').val();
        $dept = $('#dept').val();
       console.log($email+$password+$name+$institution+$dept);
          $.ajax({
            url:'apply-insert.php',
            method:'post',
            dataType:'json',
            data:{email:$email,password:$password,name:$name,institution:$institution,dept:$dept},
            success:function(data){
              $res=data;
              
              if(data.flag=='error'){
                mes(data.error,"red","block");
              }else{
                console.log($res.success);
                mes($res.success,"green","block");
                location.href="newLearn/first.php";
              }            
            }
          })
        /* } */
    });


        });
    </script>
</body>
</html>