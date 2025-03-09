<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "article_faq_db";
    $port = 3307;

    $conn = new mysqli($host, $user, $password, $db_name, $port);

    if($conn->connect_error)
        die("connection failed" . mysqli_connect_error());

?>