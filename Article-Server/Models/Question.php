<?php

    require("../Connection/connection.php");
    require("QuestionSkeleton.php");

    class Question{

        public static function createQuestion($QuestionSkeketon, $conn) {

            $query = $conn->prepare("INSERT INTO questions (question, answer) VALUES(?, ?);");
            $query->bind_param("ss", $QuestionSkeketon->get_question(),
                                      $QuestionSkeketon->get_answer());
            $query->execute();
            $query->close();
        }

        public static function updateQuestion() {

        }

        public static function readQuestion() {

        }

        public static function deleteQuestion() {

        }
    }

?>