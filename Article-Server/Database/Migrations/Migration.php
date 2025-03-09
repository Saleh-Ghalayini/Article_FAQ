<?php

    require("../../Connection/connection.php");
    require("./CreateUserTable.php");
    require("./CreateQuestionsTable.php");


    class Migration {

        public static function createTables($conn) {
            CreateUsersTable::create_users_table($conn);
            CreateQuestionTable::create_questions_table($conn);
        }

    }
    Migration::createTables($conn);
?>