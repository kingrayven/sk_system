<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sk_management";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    error_log("Connection failed: " . $conn->connect_error);
    die("Database connection error.");
}

$conn->set_charset("utf8mb4");
mysqli_report(MYSQLI_REPORT_OFF);
?>
