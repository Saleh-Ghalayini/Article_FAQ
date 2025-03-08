<?php

    class UserSkeleton{

        private $full_name;
        private $email;
        private $password;

        function __construct($full_name, $email, $password) {
            $this->full_name = $full_name;
            $this->email = $email;
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

        function set_email($email) {
            $this->email = $email;
        }

        function set_password($password) {
            $this->password = $password;
        }

    }

?>