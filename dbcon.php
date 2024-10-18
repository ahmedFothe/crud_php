<?php
    // Create some constant for connection with database 
    define("HOST_NAME","localhost");
    define("USER_NAME","root");
    define("PASSWORD","");
    define("DATABASE_NAME","practice");

    // connection with databse of php
    $connection_with_database = mysqli_connect(HOST_NAME,USER_NAME,PASSWORD,DATABASE_NAME);

    // condition for connection with database
    if(!($connection_with_database)){
        die("Failed connection with database".mysqli_error($connection_with_database));
    }
?>



<!-- INSERT INTO `personal_data` (`id`, `Name`, `Phone`, `Email`, `DOB`, `Profile`) VALUES (NULL, 'Fothe Ahmed', '01841513083', 'fotheahmed83@gmail.com', '16/12/2003', 'profile.jpg'); -->
