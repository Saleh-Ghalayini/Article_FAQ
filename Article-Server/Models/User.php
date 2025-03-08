<?php

    require("../Connection/connection.php");
    require("UserSkeleton.php");

    class User {

        public static function checkEmail($email, $conn) {
            //checking if email already exists
            $query = $conn->prepare("SELECT email FROM users WHERE email = ?");
            $query->bind_param("s", $email);
            $query->execute();
            $query->store_result();
            if ($query->num_rows > 0)
                false;
            $query->close();
            return true;
        }

        public static function checkPassword($UserSkeleton, $conn) {
            if(strlen($UserSkeleton->get_password()) < 8)
                return false;
            return true;
        }

        public static function createUser($UserSkeleton, $conn) {
            
            if(User::checkEmail($UserSkeleton->get_email(), $conn) 
                && !User::checkPassword($UserSkeleton->get_password(), $conn)) {
                //inserting the data of the user object into the db
                $query = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES(?, ?, ?);");
                $query->bind_param("sss", $UserSkeleton->get_fullName(),
                                        $UserSkeleton->get_email(),
                                        $UserSkeleton->get_password());
                $query->execute();
                $query->close();
            }else
                Utilities::response("Failed", "Couldn't create user");
                
        }
        public static function updateUser($UserSkeleton, $conn) {
            
            if(User::checkEmail($UserSkeleton->get_email(), $conn) 
                && !User::checkPassword($UserSkeleton->get_password(), $conn)) {

                $query = $conn->prepare("UPDATE users SET full_name = ?, email = ?, password = ?");
                $query->bind_param("sss", $UserSkeleton->get_fullName(),
                                        $UserSkeleton->get_email(),
                                        $UserSkeleton->get_password());
                $query->execute();
                $query->close();
            }
        }

        public static function readUser($UserSkeleton, $conn) {
            
        }

        public static function deleteUser($UserSkeleton, $conn) {
            //chose to delete by email to take advantage of the userskeleton class and use it.
            $query = $conn->prepare("DELETE FROM users WHERE email = ?");
            $query->bind_param("s", $UserSkeleton->get_email());
            $query->execute();
            $query->close();
        }
    }

?>