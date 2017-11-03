<?php
$con = new mysqli("localhost","root","","blossom");


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

?>
