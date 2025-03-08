<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $db_name = "article_faq_db";

    $conn = new mysqli($host, $user, $password, $db_name);

    if($mysqli->connect_error)
        die("connection failed" . mysqli_connect_error());

?>