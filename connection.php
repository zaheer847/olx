<?php
$host="localhost";
$user="root";
$password="8786";
$db="olx";
$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>