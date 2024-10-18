<?php

include('dbcon.php');

if(isset($_POST['personal_data_add'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    $profile_img_name = $_FILES['profile_img']['name'];
    $profile_img_tmp_name = $_FILES['profile_img']['tmp_name'];
    move_uploaded_file($profile_img_tmp_name,"upload/".$profile_img_name);


        $query = "INSERT INTO `personal_data` (`id`,`Name`,`Phone`,`Email`,`DOB`,`Profile`) VALUES (NULL,'$name','$phone','$email','$dob','$profile_img_name')";
        $insert_data_webpage = mysqli_query($connection_with_database,$query);

        if(!($insert_data_webpage)){
            die("Failed Connection with database".mysqli_error($connection_with_database));
        }else{
            header("location:index.php?success_msg= Insert Data Successfully");
        }
}