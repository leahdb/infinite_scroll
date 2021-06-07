<?php
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','sp');

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME); //conn 3l w3schools

// Check connection
if (!$link) {
  die("error" . mysqli_connect_error());
}