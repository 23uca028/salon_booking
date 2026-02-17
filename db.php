<?php
$servername = "sql204.infinityfree.com";
$username = "if0_41129558";
$password = "seleinaa0809";
$database = "if0_41129558_salon_booking";

error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
