<?php
function mysqlli(){
    $mysqli = new mysqli('127.0.0.1','blant','1234','math');

    if ($mysqli->connect_error) {
        die('Error : ('. $mysqli->connect_errno .') '. $mysqli->connect_error);
    }
    return $mysqli;
}
