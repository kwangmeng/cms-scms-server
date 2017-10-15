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
 

$target_path = "uploads/";
 
$target_path = $target_path . basename( $_FILES['uploadFile']['name']);
if (move_uploaded_file($_FILES['uploadFile']['tmp_name'], $target_path)) {
    $clubid = $_POST['club_id'];
    $url = "http://192.168.0.2/cms-scms-server/".$target_path;

    $sql = "UPDATE clubs SET image='$url' WHERE id='$clubid'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo $url;
    }

} else {
echo $target_path;
    echo "There was an error uploading the file, please try again!";
}


?>