<?php

include 'db.php';


    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
 
  
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         
 
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
 
        exit(0);
    }
 
 
    $postdata = file_get_contents("php://input");
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $name = $request->name;

        $sql = "INSERT INTO clubs (name,advisor,image,description) VALUES ('$name','49','http://kennynkm.com/scms/assets/img/unimy.png','This is an awesome club')";
        $result = mysqli_query($conn,$sql);
        $last_id = mysqli_insert_id($conn);
        $sql1 = "INSERT INTO details_clubs (type,clubid) VALUES ('established','$last_id')";
        $result1 = mysqli_query($conn,$sql1);

        if($result1){
            echo "good";
        }else{
            echo "bad";
        }
    }
    else {
        echo "empty";
    }



?>