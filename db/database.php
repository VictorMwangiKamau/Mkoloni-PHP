<?php

require_once("./../config/config.php");

$database = "hello";


$conn = mysqli_connect(SERVER, USER_NAME, PASSWORD, $database);

if(!$conn)
 echo "Failed to connected successfully";

?>
