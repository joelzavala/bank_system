<?php

ini_set("display_errors", 1);

error_reporting(E_ALL);


$mysqli = new mysqli("localhost", "bank", "holamundo", "bank");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>
