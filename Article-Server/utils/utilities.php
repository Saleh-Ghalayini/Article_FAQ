<?php

    class Utilities{

        public static function response($status, $message) {
                    echo json_encode(['status' => $status, 'message' => $message]);
                    exit;
                }
    }
?>