<?php
session_start();
if(isset($_SESSION['id'])){
    include 'php_files/config.inc.php';
    $author_email=$_SESSION['email'];
    $date_time=date("d-M-Y")." ".date("h-i-sa");
    if(isset($_POST['add'])){
        echo "<pre>";
        print_r($_FILES['video_name']);
        echo "</pre>"; 
        echo "<pre>";
        print_r($_FILES['pdf_details']);
        echo "</pre>"; 
        if(isset($_FILES['video_name']) && isset($_FILES['pdf_details'])){
            $desc=mysqli_real_escape_string($con,trim($_POST['desc']));
            $title=mysqli_real_escape_string($con,trim($_POST['title']));
                $pdf_name= $_FILES['pdf_details']['name'];
                $pdf_tmp_name=$_FILES['pdf_details']['tmp_name'];
                $video_name=$_FILES['video_name']['name'];
                $video_tmp_name=$_FILES['video_name']['tmp_name'];
                move_uploaded_file($pdf_tmp_name,"assets/user_upload/materials/".$pdf_name);
                move_uploaded_file($video_tmp_name,"assets/user_upload/".$video_name);
                $author_name=$_SESSION['name'];
                $author_email=$_SESSION['email'];
                $getImg="SELECT img_path,speciality from teachers where email='$author_email'";
                $res=mysqli_query($con,$getImg);
                $data=mysqli_fetch_assoc($res);
                $path=$data['img_path'];
                $speciality=$data['speciality'];
                $sql="INSERT INTO tutorials(author_name,author_img,email,upload_date,video_link,course_name,materials,description,title) values('$author_name','$path','$author_email','$date_time','$video_name','$speciality','$pdf_name','$desc','$title')";
               if(mysqli_query($con,$sql)){
                    header('location: view-content.php');
                }
        }
        /* Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ipsam error maxime sequi. Ad repellendus ea atque totam, fuga dicta. */
            // 
            // if(mysqli_query($conn,$sql)){
            //     header('location: teacher-profile.php');
            // }
    //     }
     }
}

?>