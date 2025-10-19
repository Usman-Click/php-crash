<?php 

define("DB_NAME", "php_dev");
define("DB_USER", "usman");
define("USER_PWD", "112233");
define("DB_HOST", "localhost");


$conn = new mysqli(DB_HOST, DB_USER, USER_PWD, DB_NAME);
if ($conn->connect_error) {
    die("DB Connection Error");
}

