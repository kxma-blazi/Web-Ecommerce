<?php
require './include/db.php';

if($_SERVER['REQUEST_METHOD']==="GET") {
       $stmt = "select name from category wwhere status=1";
       if($result = $conn -> $query($stmt)){
              while($row = $result -> fetch_assoc()) {
                     $arr = array();
                     while($name = $result -> fetch_assoc()['name']) {
                            array_push($arr, $name);
              }
              echo json_encode(['categories' => $arr]);
              }
       }
       else{
              echo json_encode(['error' => 'something went wrong. Try again']);
       }
       exit();
}