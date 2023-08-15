<?php

    session_start();

    $dept=strtolower(trim($_POST['dept_name']));
    include '../php_files/config.inc.php';

    $query="INSERT into departments(dept_name,total_ques) values('$dept', 0)";
    $run=mysqli_query($con,$query) or die("Query failed");

    if($run){
        header("location: view-departments.php");
    }


?>