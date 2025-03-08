<?php

    require("../Connection/connection.php");
    require("UserSkeleton.php");

    class User {

        public static function createUser($UserSkeleton, $conn) {
            //checking if email already exists
            $query = $conn->prepare("SELECT email FROM users WHERE email = ?");
            $query->bind_param("s", $UserSkeleton->get_email());
            $query->execute();
            $query->store_result();
            if ($query->num_rows > 0)
                Utilities::response("Failed", "Email already registered.");
            $query->close();

            $query = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES(?, ?, ?);");
            $query->bind_param("sss", $UserSkeleton->get_fullName(),
                                      $UserSkeleton->get_email(),
                                      $UserSkeleton->get_password());
            $query->execute();
            $query->close();
        }
    }

?>