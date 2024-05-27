<?php
$servername = "sql211.infinityfree.com"; // Your MySQL host name
$username = "if0_36624665";              // Your MySQL username
$password = "Ai2103003";      // Your MySQL password (same as your vPanel password)
$dbname = "if0_36624665_garment_showcase"; // Your full database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
