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
        $email = $request->email;
        $password= $request->password;
        $firstname = $request->firstname;
        $lastname = $request->lastname;



        $sql = "INSERT INTO users (email,password,firstname,lastname, type,role) VALUES ('$email','$password','$firstname','$lastname','active','applicant')";
        $result = mysqli_query($conn,$sql);     


        if($result){
            echo "good";
        }else{
            echo "bad";
        }
    }
    else {
        echo "empty";
    }



?>