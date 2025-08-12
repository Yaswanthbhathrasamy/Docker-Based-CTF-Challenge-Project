<?php
// db.php
$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = ''; // set your MySQL root password or a restricted user
$DB_NAME = 'nevermore';

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if (!$conn) {
    die("DB connection failed: " . mysqli_connect_error());
}
?>
