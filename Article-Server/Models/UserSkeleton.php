<?php

    class UserSkeleton{

        private $full_name;
        private $email;
        private $password;

        function __construct($full_name, $email, $password) {
            $this->full_name = $full_name;
            $this->set_email($email);
            $this->password = hash('sha256', $password);
        }
        
        function get_fullName() {
            return $this->full_name;
        }

        function get_email() {
            return $this->email;
        }
        
        function get_password() {
            return $this->password;
        }

        function set_fullName($full_name) {
            $this->full_name = $full_name;
        }

        //in these 2 functions below we're checking the validity of the email format before creating the object
        //this step should happen before trying to insert the user into the DB so that the data can be easily edited
        private function checkEmail($email) {
            return filter_var($email, FILTER_VALIDATE_EMAIL);
        }

        function set_email($email) {
            if($this->checkEmail($email))
                $this->email = $email;
            else
                throw new Exception("Invalid email format");
        }

        function set_password($password) {
            $this->password = $password;
        }
    }
?>