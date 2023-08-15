<?php
  session_start();
  if(isset($_SESSION['id'])){
    header("location: index.php");
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="assets/login-quiz.png"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form id="login-form">
      
                <!-- Email input -->
                <div class="form-outline mb-4">
                <h1 class="display-4 text-bold">Teacher Login</h1>
                  <input id="email" name="email" type="email" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Enter a valid email address" />
                  <label class="form-label" for="form3Example3">Email address</label>
                </div>
      
                <!-- Password input -->
                <div class="form-outline mb-3">
                  <input id="password" name="password" type="password" id="form3Example4" class="form-control form-control-lg"
                    placeholder="Enter password" />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>
      
                <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                      Remember me
                    </label>
                  </div>
                  <a href="#!" class="text-body">Forgot password?</a>
                </div>
      
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button name="login" type="button" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;" id="loginBtn">Login</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="apply.php"
                      class="link-danger">Apply?</a></p>
                </div>
      
              </form>
            </div>
          </div>
        </div>
        
      </section>
<div class="message">
  <strong id="msg">Login failed</strong>
</div>
<script src="js/jquery.js"></script>
<script>
 
  $(document).ready(function(){
    console.log("Jquery");
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
    $("#loginBtn").click(function(e){
        e.preventDefault();
        $email = $('#email').val();
        $password = $('#password').val();
       
          $.ajax({
            url:'php_files/teacher-login-check.php',
            method:'post',
            dataType:'json',
            data:{email:$email,password:$password,user:"teacher"},
            success:function(data){
              $res=data;
              
              if(data.flag=='error'){
                mes(data.error,"red","block");
              }else{
                console.log($res.success);
                mes($res.success,"green","block");
                location.href="index.php";
              }            
            }
          })
        /* } */
    });
  });

</script>
</body>
</html>