<?php
// Setting up the Database Connection
session_start();
$servername = "localhost";
$username = "jhamler10";
$password = "aqu3a5uvu";
$dbname = "jhamler10_lecturesnippets";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
?>