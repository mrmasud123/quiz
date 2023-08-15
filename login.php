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
    <style>
      body{
        overflow:hidden;
        background:darkslategray;
      }
      div#r-form{
        position: absolute;
        right: -50%;
        top:1%%;
        transition:0.5s;
      }
      #l-form{
        position: absolute;
       
        top: 15%;
        right:2%;
        transition:0.5s;
      }
      .sh{
        right:-50%;
      }
      div#l-form,div#r-form {
        border: 1px solid;
        padding: 20px;
        background: white;
        border-radius: 25px;
        box-sizing: border-box;
       box-shadow: -8px 6px 50px -11px rgba(23,23,23,0.76) ;
      }
      .left h1 {
    text-transform: uppercase;
}
.left h1 {
    color: white;
    font-size: 75px;
    font-family: math;
    transform: rotate(354deg);
    text-shadow: 2px 16px 11px black;
    animation: animate 2s ease-in infinite forwards;
}
@keyframes animate {
0%{
  color: white;
}  
50%{
  color: blue;
}
100%{
  color: gainsboro;
}
}
    </style>
</head>
<body>
    
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-between align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5 left">
              <h1 class="display-4 fw-bold text-center">Easy To <br> Learn</h1>
            </div>
             <!-- login start -->
             <div id="l-form" class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form id="login-form">
      
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <h1 class="display-4 text-bold">Student Login</h1>
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
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? </p>
                </div>
      
              </form>
              <button id="reg-button" class="btn btn-sm btn-danger">Register?</button>
            </div>
            <!-- login end -->
            <!-- registration start -->
            <div id="r-form" class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form id="reg-form">
      
                <!-- Name input -->
                <div class="form-outline mb-4">
                  <h1 class="display-6 text-bold">Student Registration</h1>
                  <input id="rname" name="name" type="text" id="form3Example3" class="form-control form-control-lg"
                    placeholder="Enter your name" />
                  <label class="form-label" for="form3Example3">Full Name</label>
                </div>
      
                <!-- email input -->
                <div class="form-outline mb-3">
                  <input id="remail" name="email" type="email"  class="form-control form-control-lg"
                    placeholder="Enter email" />
                  <label class="form-label" for="form3Example4">E-mail</label>
                </div>
                <!-- password input -->
                <div class="form-outline mb-3">
                    <input id="rpassword" name="password" type="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" />
                    <label class="form-label" for="form3Example4">Password</label>
                </div>
                <!-- institution input -->
                <div class="form-outline mb-3">
                    <input id="rinstitution" name="institution" type="text" id="form3Example4" class="form-control form-control-lg" placeholder="Enter institution" />
                    <label class="form-label" for="form3Example4">Institution</label>
                </div>
                <div class="text-center text-lg-start mt-4 pt-2">
                  <button name="reg" type="button" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;" id="regBtn">Registration</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? </p>
                </div>
      
              </form>
              <button id="log-button" class="btn btn-sm btn-danger">Login?</button>
            </div>
            <!-- registration ends -->
          
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
    $login_form=$("#l-form");
    $reg_form=$("#r-form");
    $('#reg-button').click(function(){
      console.log("REg button click");
      $login_form.css("right",'-50%');
      $reg_form.css("right",'2%');
    });
    $('#log-button').click(function(){
      $login_form.css("right",'2%');
      $reg_form.css("right",'-50%');
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
    $("#loginBtn").click(function(e){
        e.preventDefault();
        $email = $('#email').val();
        $password = $('#password').val();
       
          setInterval(() => {
            $.ajax({
            url:'php_files/login-check.php',
            method:'post',
            dataType:'json',
            data:{email:$email,password:$password,user:"student"},
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
          }, 1000);
        
    });


    $("#regBtn").click(function(e){
        e.preventDefault();
        $email = $('#remail').val();
        $password = $('#rpassword').val();
        $institution = $('#rinstitution').val();
        $name = $('#rname').val();
       
          $.ajax({
            url:'php_files/student-reg.php',
            method:'post',
            dataType:'json',
            data:{email:$email,password:$password,name:$name,institution:$institution},
            success:function(data){
              $res=data;
              console.log($res);
              if(data.flag=='error'){
                mes(data.error,"red","block");
              }else{
                console.log($res.success);
                mes($res.success,"green","block");
                //location.href="index.php";
                $login_form.css("right",'0%');
                $reg_form.css("right",'-50%');
              }            
            }
          })
        
    });


  });

</script>
</body>
</html>