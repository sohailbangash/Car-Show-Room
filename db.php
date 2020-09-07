<?php
ob_start();

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','ajax_project');


$conn=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if(!$conn){
    die("connection error".mysqli_error($conn));
}


?>