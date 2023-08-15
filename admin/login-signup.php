<?php
session_start();
    if(isset($_SESSION['name'])){
        header('location: index.php');
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz app</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <style>
    div#loginForm,#signupForm {
        border-radius: 10px;
    }
div#signupForm {
    position: absolute;
    left: -50%;
    transition: all 0.5s;
}
div#message {
    position: fixed;
    top: 5%;
    right: 0;
    background: black;
    color: white;
    padding: 10px 20px;
    width: 20%;
    box-sizing: content-box;
    border-radius: 6px;
    display: none;
}
div#loginForm {
    background: #bc8989 !important;
}
body.d-flex.align-items-center.justify-content-center {
    background: darkslategrey;
}
button#logForm {
    width: 200px;
    color: black;
    font-size: larger;
    font-family: none;
}
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">
    <!-- message box starts -->
    <div id="message">
        <strong>Message goes here</strong>
    </div>
    <!-- message box ends -->
    <div class="container">
        <div class="row" style="border-radius: 10px;">
            <div class="bg-primary col-6 py-5" id="loginForm">
                <h1 class="text-center card-header">Login Form</h1>
                    <form action="">
                        <div class="form-group mt-2">
                            <label for="" class="mb-2">E-mail</label>
                            <input id='lemail' required type="text" placeholder="Enter your email" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="mb-2">Password</label>
                            <input id='lpassword' required type="password" placeholder="Enter your password" class="form-control">
                        </div>
                        <div class="form-group mt-2 text-center">
                            <button class="btn btn-success" type="submit" name="login" id="logForm">Login</button>
                        </div>
                    </form>
                    <p>Don't Have An Account?</p>
                    <button class="btn btn-primary" id="sign">Create One?</button>
            </div>
            <div class="col-6 bg-warning py-5" id="signupForm">
                <h1 class="text-center card-header">Sign Up Form</h1>
                <!-- <div class="card py-5 bg-warning"> -->
                    <form action="">
                        <div class="form-group mt-2">
                            <label for="" class="mb-2">Enter Username</label>
                            <input id="sname" required type="text" placeholder="Enter your username" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="mb-2">Enter e-mail</label>
                            <input id="semail" required type="email" placeholder="Enter your e-mail" class="form-control">
                        </div>

                        <div class="form-group mt-2">
                            <label for="" class="mb-2">Enter Password</label>
                            <input id="spassword" required type="password" placeholder="Enter your password" class="form-control">
                        </div>
                        <div class="form-group mt-2 text-center">
                            <button id='signForm' class="btn btn-primary" type="submit" name="signup">Signup</button>
                        </div>
                    </form>
                    <p>Already Have An Account?</p>
                    <button class="btn btn-primary" id="login">Login?</button>
                <!-- </div> -->
            </div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script>
        document.querySelector('#sign').addEventListener('click',()=>{
            document.querySelector('#signupForm').style.left='0px';
        });
        document.querySelector('#login').addEventListener('click',()=>{
            document.querySelector('#signupForm').style.left='-50%';
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#signForm").click(function(e){
            console.log("Signup");
            e.preventDefault();
            var data={};
            data.sname=$("#sname").val();
            data.semail=$("#semail").val();
            data.spassword=$("#spassword").val();
            console.log(data);
            $.ajax({
                url:'signup-code.php',
                type:'POST',
                data:{
                    data: data
                },
                success:function(data){
                    if(data==0){
                    showMsg("Sign Up success");
                    location.href="index.php";
                    $("#sname").val('');
                    $("#semail").val('');
                    $("#spassword").val('');
                }else{
                    showMsg(data);
                }
                }
            });
           });
/* login */
$('#logForm').click(function(event){
                event.preventDefault();
            $lemail=$("#lemail").val();
            $lpassword=$("#lpassword").val();
            console.log($lemail, $lpassword);

            var data={};
            data.lemail=$lemail;
            data.lpassword=$lpassword;
                $.ajax({
            url:'login-code.php',
            type:'POST',
            data:{
                data: data
            },
            success:function(data){
                if(data==0){
                    showMsg("Login success");
                    location.href="index.php";
                }else{
                    showMsg(data);
                }
            }
           });
            });
           function showMsg(data){
                $("#message").css('display','block');
                $("#message").text(data);
                setTimeout(() => {
                    $("#message").css('display','none');
                    $("#message").text("");
                }, 1500);
            }
        });
    </script>
</body>
</html>