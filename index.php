<?php include('dbcon.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
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
        #table_data{
            vertical-align: middle;
        }
    </style>
</head>
<body>


        <h1 id="crud_header">CRUD DATA INSERT PAGE</h1>


            <?php
                // Error and Success Message
                if(isset($_GET['success_msg'])){
                    echo '<h6 style="color:#E2F1E7; text-align:center;">'.$_GET['success_msg']."</h6>";
                }elseif(isset($_GET['update_msg'])){
                    echo '<h6 style="color:#E2F1E7; text-align:center;">'.$_GET['update_msg']."</h6>";
                }elseif(isset($_GET['dlt_msg'])){
                    echo '<h6 style="color:#E2F1E7; text-align:center;">'.$_GET['dlt_msg']."</h6>";
                }
            ?>
    
            <form action="insert_data.php" method="POST" class="form_container_style container " enctype="multipart/form-data">

                <div class="form-group p-2 form_container_div_style">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="form-group p-2 form_container_div_style">
                    <label for="name">Phone:</label>
                    <input type="tel" name="phone" id="phone" class="form-control" required>
                </div>

                <div class="form-group p-2 form_container_div_style">
                    <label for="name">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="form-group p-2 form_container_div_style">
                    <label for="dob">Date of Birth :</label>
                    <input type="date" name="dob" id="dob" class="form-control" required>
                </div>

                <div class="form-group p-2 form_container_div_style">
                    <label for="name">Profile:</label>
                    <input type="file" name="profile_img" id="profile_img" class="form-control" required>
                </div>
                <div class="form-group form_container_div_style">
                    <input type="submit" value="Add" name="personal_data_add"class="btn btn-success m-2">
                </div>
            
            </form>


            <table class="table table-striped table-bordered container mt-2 text-center">
                <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Date of Birth</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM `personal_data`";
                        $showWebpage = mysqli_query($connection_with_database,$query);

                        if(!($showWebpage)){
                            die("Failed Connection With Database".mysqli_error($connection_with_database));
                        }else{
                            while($personal_info_row = mysqli_fetch_assoc($showWebpage)){
                        ?>
                    <tr>
                        <td><img src="upload/<?php echo $personal_info_row['Profile'] ?>" alt="profile" style="width: 70px; border-radius:10%;"></td>
                        <td id="table_data"><?php echo $personal_info_row['Name'] ?></td>
                        <td id="table_data"><?php echo $personal_info_row['Phone'] ?></td>
                        <td id="table_data"><?php echo $personal_info_row['Email'] ?></td>
                        <td id="table_data"><?php echo $personal_info_row['DOB'] ?></td>
                        <td id="table_data"><a href="update_data.php?id=<?php echo $personal_info_row['id']?>" class="btn btn-success">Update</a></td>
                        <td id="table_data"><a href="delete_data.php?id=<?php echo $personal_info_row['id']?>" class="btn btn-danger">Delete</a></td>

                    </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>