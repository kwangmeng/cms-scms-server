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
        $id = $request->id;
        
        $sql = "SELECT details_clubs.*,clubs.id as 'clubid',clubs.name,clubs.advisor,clubs.description,clubs.image, COUNT(club_members.club_id) AS amt,COUNT(activity.club_id) AS actamt FROM `clubs` 
        INNER JOIN details_clubs ON details_clubs.clubid = clubs.id
        LEFT JOIN club_members ON clubs.id = club_members.club_id  
        LEFT JOIN activity ON clubs.id = activity.club_id
        WHERE clubs.id = '$id'";
        $result = mysqli_query($conn,$sql);

        $row = mysqli_fetch_assoc($result);

        echo json_encode($row);


    }


?>