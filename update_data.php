<?php
    include('dbcon.php');
?>
<?php

    // SELECT PERSONAL DATA 
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM `personal_data` WHERE `id` = '$id'";
        $select_personal_data = mysqli_query($connection_with_database,$query);

        if(!($select_personal_data)){
            die("Failed Connection with database".mysqli_error($connection_with_database));
        }else{
            $fetch_row_data = mysqli_fetch_assoc($select_personal_data);
        }
    }


    // UPDATE PERSONAL DATA DATABASE AND WEBSITE
    if(isset($_POST['update_personal_data_add'])){
        if(isset($_GET['new_id'])){
                $new_id = $_GET['new_id'];
        }
                $update_name = $_POST['update_name'];
                $update_phone = $_POST['update_phone'];
                $update_email = $_POST['update_email'];
                $update_dob = $_POST['update_dob'];
                $update_profile_img_name = $_FILES['update_profile_img']['name'];
                $update_profile_img_tmp_name = $_FILES['update_profile_img']['tmp_name'];
                move_uploaded_file($update_profile_img_tmp_name,"upload/".$update_profile_img_name);


            
            $query = "UPDATE `personal_data` SET `Name`='$update_name',`Phone`='$update_phone',`Email`='$update_email',`DOB`='$update_dob',`Profile`='$update_profile_img_name' WHERE `id` = '$new_id'";
            $update_data = mysqli_query($connection_with_database,$query);
        
            if(!$update_data){
                die("Failed Connection with database".mysqli_error($connection_with_database));
            }else{
                header("location:index.php?update_msg= Your Data has updated");
            }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background-color: #629584;
        }
        #crud_header{
                    text-align: center;
                    background-color: #243642;
                    color: #E2F1E7;
                    padding: 1rem;
                    letter-spacing: 0.5rem;
        }
        .form_container_div_style{
            width: 50vw;
            display: block;
            margin: 0 auto;
        }
        td,th{
            vertical-align: center;
        }
    </style>
</head>
<body>


        <h1 id="crud_header">CRUD DATA UPDATE PAGE</h1>



    <form action="update_data.php?new_id=<?php echo $id; ?>" method="POST" class="form_container_style container " enctype="multipart/form-data">

                <div class="form-group p-2 form_container_div_style">
                    <label for="name">Name:</label>
                    <input type="text" name="update_name" id="name" class="form-control" value="<?php echo $fetch_row_data['Name'] ?>">
                </div>

                <div class="form-group p-2 form_container_div_style">
                    <label for="name">Phone:</label>
                    <input type="tel" name="update_phone" id="phone" class="form-control" value="<?php echo $fetch_row_data['Phone'] ?>">
                </div>

                <div class="form-group p-2 form_container_div_style">
                    <label for="name">Email:</label>
                    <input type="email" name="update_email" id="email" class="form-control" value="<?php echo $fetch_row_data['Email'] ?>">
                </div>

                <div class="form-group p-2 form_container_div_style">
                    <label for="dob">Date of Birth :</label>
                    <input type="date" name="update_dob" id="dob" class="form-control" value="<?php echo $fetch_row_data['DOB'] ?>">
                </div>

                <div class="form-group p-2 form_container_div_style">
                    <label for="name">Profile:</label>
                    <input type="file" name="update_profile_img" id="profile_img" class="form-control"  value="<?php echo $fetch_row_data['Profile'] ?>">
                </div>
                <div class="form-group form_container_div_style">
                    <input type="submit" value="Update" name="update_personal_data_add"class="btn btn-success m-2">
                </div>
            
    </form>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>