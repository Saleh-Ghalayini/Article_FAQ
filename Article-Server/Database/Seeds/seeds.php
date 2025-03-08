<?php

    require("../../Connection/connection.php");

    class Seeder{
        
        public static function seed_users($conn) {

            $users = [
                        [
                            'full_name' => 'Sarah Jamal',
                            'email' => 'sarahjamal6@gmail.com',
                            'password' => hash('sha256', 'tigerlake12')
                        ],
                        [
                            'full_name' => 'Ahmed Khaled',
                            'email' => 'ahmedkhaled8@gmail.com',
                            'password' => hash('sha256', 'blueberry9')
                        ],
                        [
                            'full_name' => 'Maya Hassan',
                            'email' => 'mayahassan4@gmail.com',
                            'password' => hash('sha256', 'quickfox11')
                        ],
                        [
                            'full_name' => 'Omar Ziad',
                            'email' => 'omarziad3@gmail.com',
                            'password' => hash('sha256', 'silverstar8')
                        ],
                        [
                            'full_name' => 'Layla Noor',
                            'email' => 'laylanoor7@gmail.com',
                            'password' => hash('sha256', 'forestmoon10')
                        ],
                        [
                            'full_name' => 'Hassan Rami',
                            'email' => 'hassanrami2@gmail.com',
                            'password' => hash('sha256', 'redsky99')
                        ],
                        [
                            'full_name' => 'Farah Sami',
                            'email' => 'farahsami5@gmail.com',
                            'password' => hash('sha256', 'sunsetwave8')
                        ],
                        [
                            'full_name' => 'Kareem Adel',
                            'email' => 'kareemadel9@gmail.com',
                            'password' => hash('sha256', 'goldenkey12')
                        ],
                        [
                            'full_name' => 'Nour Yassin',
                            'email' => 'nouryassin1@gmail.com',
                            'password' => hash('sha256', 'stormcloud10')
                        ],
                        [
                            'full_name' => 'Yousef Omar',
                            'email' => 'yousefomar6@gmail.com',
                            'password' => hash('sha256', 'brightrise9')
                        ]
                ];

            foreach($users as $user) {
                $query = "INSERT INTO users
                          (full_name, email, password)
                          VALUES ('{$user['full_name']}',
                                  '{$user['email']}',
                                  '{$user['password']}');";
                if($conn->query($query))
                    echo "Inserted user: {$user['full_name']}, {$user['email']}, {$user['password']}";
                else
                    echo "Couldn't insert user: {$user['full_name']}, {$user['email']}, {$user['password']}";
            }

        }

    }

?>