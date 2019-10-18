<?php
    // $servername = "localhost";
    // $database = "brindeshop";
    // $username = "root";
    // $password = "";

    // $servername = "144.217.173.220";
    // $database = "kebragal_brindes";
    // $username = "kebragal_b_user";
    // $password = "a1s2d3A!S@D#";

    $servername = "mysql.objetiveti.com.br";
    $database = "objetiveti12";
    $username = "objetiveti12";
    $password = "objetiveti2019";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        // echo "Não deu!";
    }else{
        // echo "Connected successfully";
    }

?>