<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database_name = "web_project";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database_name);
    
    if(!$conn){
        die("connection Failed".mysqli_connect_error());
    }
?>