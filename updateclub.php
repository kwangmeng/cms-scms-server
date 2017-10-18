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
        $clubid = $request->id;
        $agm = $request->agm;
        $advisor = $request->advisor;
        $applicant = $request->applicant;
        $budget = $request->budget;
        $constitution = $request->constitution;
        $description = $request->description;
        $fee = $request->fee;
        $mobile = $request->mobile;
        $name = $request->name;
        $objectives = $request->objectives;
        
        $sql = "UPDATE clubs SET name='$name',advisor='$advisor',description='$description' WHERE id='$clubid'";
        $result = mysqli_query($conn,$sql);
        $sql1 = "UPDATE details_clubs SET applicant_name='$applicant',mobile_num='$mobile',objectives='$objectives', agm_date='$agm',constitution='$constitution',fee='$fee',budget='$budget' WHERE clubid='$clubid'";
        $result1 = mysqli_query($conn,$sql1);

        if($result1){
        echo 'good';
        }else{
        echo "bad";
        }


    }else{
        echo "empty";
    }


?>