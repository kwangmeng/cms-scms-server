<?php

include 'db.php';

$sql = "SELECT * FROM club_members";
$result = mysqli_query($conn,$sql);
$clubs = array();

while($row = mysqli_fetch_assoc($result)){
    $clubs[] = $row;
}


echo json_encode($clubs);




?>