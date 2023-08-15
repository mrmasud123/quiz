
<script src="js/jquery.js"></script>
    <script>
        $(document).ready(function(){
            console.log("Jquery");
            $userBtn=$('.useroption');
            $userInfo=$('.options');
            $userBtn.click(function(){
                $('.options').toggleClass("info");
            });
            $courses=["Data Structures", "Algorithm", "Database", "Compiler Design"]
            $ind=0;
            setInterval(function(){
                if($ind<=$courses.length){
                    $("#course").text($courses[$ind]);
                    $ind++
                }else{
                    $ind=0;
                }
            },1000);
            console.log($courses.length);
        });
    </script>
</body>
</html>