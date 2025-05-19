<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "auth";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "INSERT INTO login (username, password) VALUES ('$username', '$password')";
if ($conn->query($sql)) {
    echo "Registration successful. <a href='index.html'>Login now</a>";
} else {
    echo "Username already exists or error occurred. <a href='register.html'>Try again</a>";
}
