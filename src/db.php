<?php
$servername = "db";
$username = "ctfuser";
$password = "ctfpass";
$dbname = "wednesday_ctf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
