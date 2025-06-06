<?php
$conn = new mysqli("localhost:3306","root","root","eshop");
if ($conn->connect_error) {
    echo json_encode('error' => $conn->connect_error]);
       exit();
}