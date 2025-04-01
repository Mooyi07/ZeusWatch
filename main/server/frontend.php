<?php 
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../");
    exit();
}

$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
$username = $_SESSION['username'];
$displayName = "$firstName $lastName";

$brand = "ZeusWatch";

$apiKey = "OknYUFT7V64hnfhsh9HUN";  // Consider storing this securely

$date = date("F d, Y") . " - " . date("l");

$schoolStatus = (date("l") == "Saturday" || date("l") == "Sunday") ? 0 : 1;

$weekly = "100000";

?>
