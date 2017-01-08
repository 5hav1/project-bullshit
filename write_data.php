<?php

    // Prepare variables for database connection

    // enter database username, I used "arduino" in step 2.2
    // enter database password, I used "arduinotest" in step 2.2
    // IMPORTANT: if you are using XAMPP enter "localhost", but if you have an online website enter its address, ie."www.yourwebsite.com"

    include('dbase.php');
    // Prepare the SQL statement

    $sql = "INSERT INTO sensor (value) VALUES ('".$_GET["value"]."')";

    // Execute SQL statement

    mysqli_query($con,$sql);

?>
