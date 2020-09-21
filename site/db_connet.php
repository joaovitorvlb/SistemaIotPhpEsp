<?php
    $servername = "10.100.26.104";
    $username = "root";
    $password = "CHKplq37322";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password);
    $conn2 = "teste";
    // Check connection
    if ($conn->connect_error) {
        //die("Connection failed: " . $conn->connect_error);
    } 
    //echo "Connected successfully";
?>
