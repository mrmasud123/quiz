<?php include 'header.inc.php'; ?>

<?php

    include 'php_files/add-question.inc.php';
?>

<div class="message">
  <strong id="msg"></strong>
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

            function check(){
            $present_id=$("#ans_id_check").val();
            $.ajax({
                url:'admin/ans-id-check.php',
                method:'post',
                data:{id:$present_id},
                dataType:'json',
                success:function($data){
                    console.log($data);
                    $res=$data;
                    if($res.flag="success"){
                        $("#ans-range").text($res.msg); 
                        $("#submitBtn").attr('disabled',false);
                        $ans_check=true;
                    }else{
                        $("#ans-range").text($res.msg);
                        $("#submitBtn").attr('disabled',true);
                    }
                    
                }
            });
    }
    $("#ans_id_check").change(function(){
        check();
    });

    $("#submitBtn").click(function(e){
        e.preventDefault();
        
        $aid=$("#ans_id_check").val();
        $ques=$("#ques").val();
        $qdept=$("#qdept").val();
        $opt_1=$("#opt_1").val();
        $opt_2=$("#opt_2").val();
        $opt_3=$("#opt_3").val();
        $opt_4=$("#opt_4").val();
        
        $.ajax({
            url:'admin/add-ques-code.php',
            method:"POST",
            data:{aid:$aid,qdept:$qdept,ques:$ques,opt_1:$opt_1,opt_2:$opt_2,opt_3:$opt_3,opt_4:$opt_4},
            dataType:'json',
            success:function($data){
                $res=$data;
              
              if($data.flag=='error'){
                mes($data.error,"red","block");
              }else{
                console.log($res.success);
                mes($res.success,"green","block");
                location.href="profile.php";
              }
            }
        });
        
    });

        });
    </script>
</body>
</html>