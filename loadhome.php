<?php

include 'db.php';

$sql = "SELECT * FROM details_clubs WHERE type='application'";
$sql1 = "SELECT * FROM details_clubs WHERE type='established'";
$sql2 = "SELECT * FROM activity";
$sql3 = "SELECT * FROM club_members";


$result = mysqli_query($conn,$sql);
$result1 = mysqli_query($conn,$sql1);
$result2 = mysqli_query($conn,$sql2);
$result3 = mysqli_query($conn,$sql3);

$rowcount = mysqli_num_rows($result);
$rowcount1 = mysqli_num_rows($result1);
$rowcount2 = mysqli_num_rows($result2);
$rowcount3 = mysqli_num_rows($result3);

$row = array(
    "applyamt"=>$rowcount,
    "clubamt"=>$rowcount1,
    "activityamt"=>$rowcount2,
    "studentamt"=>$rowcount3
);




echo json_encode($row);





?>