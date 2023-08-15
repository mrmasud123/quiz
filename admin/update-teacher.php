<?php include 'header.inc.php'; ?>
    <!-- Header ends -->

<!-- add form starts -->
<div class="container-fluid all-items flex-column">
        <h1>Add Teacher Table</h1>
        <div class="container">
            <div class="row">
                <div class="form-container">
                    <?php
                        if(isset($_SESSION['name'])){
                            $id=$_GET['id'];
                            
                                $query="SELECT * from teachers where id=$id";
                                $result=mysqli_query($con,$query) or die('Query failed');
                                $data=mysqli_fetch_assoc($result);
                                
                        }
                    ?>
                    <form action="" method="post">
                        <div class="form-group mt-2">
                            </div>
                            <input id="name" type="text" value=<?php echo $data['name'] ?> class="form-control">
                            <input id="id" type="text" value=<?php echo $data['id'] ?> hidden class="form-control">
                        <div class="form-group mt-2">
                            <input id="email" type="email" value=<?php echo $data['email'] ?> class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <input id="password" type="password" value=<?php echo $data['password'] ?> class="form-control">
                        </div>
                        <div class="form-group mt-2 d-flex justify-content-center flex-column">
                            <input readonly disabled id="speciality" type="text" value=<?php echo $data['speciality'] ?> class="form-control">
                            <span class="mt-3 alert alert-danger">*N:B - Speciality can not be updated</span>
                        </div>
                        <div class="form-group mt-2">
                            <input id="institution" type="text" value=<?php echo $data['institution'] ?> class="form-control">
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
    function showFun(){
            if(document.querySelector("#mycheck").checked==true){
                console.log("Checkeed");
            }else{
                console.log("Not checked");
            }
        }
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
        $id=$("#id").val();
        $password = $('#password').val();
        $name = $('#name').val();
        $institution = $('#institution').val();
       
          $.ajax({
            url:'update-teacher-code.php',
            method:'post',
            dataType:'json',
            data:{id:$id,email:$email,password:$password,institution:$institution,name:$name},
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