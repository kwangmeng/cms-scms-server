<?php 

$servername = "109.199.119.98";
$dbusername = "bigpoten_kenny";
$dbpassword = "Kwangmeng6687";
$db = "bigpoten_cms";
// Create connection
$conn = mysqli_connect($servername, $dbusername, $dbpassword, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>