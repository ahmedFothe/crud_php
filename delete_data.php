<?php

include('dbcon.php');

if(isset($_GET['id'])){
    $dlt_id = $_GET['id'];
    $query = "DELETE FROM `personal_data` WHERE `id` = '$dlt_id'";
    $dlt_row = mysqli_query($connection_with_database,$query);
    if(!$dlt_id){
        die("Failed connection with database".mysqli_error($connection_with_database));
    }else{
        header("location:index.php?dlt_msg=Deleted Data Successfully");
    }
}