<?php

include 'db.php';

$sql = "SELECT clubs.*, COUNT(club_members.club_id) AS amt, COUNT(activity.club_id) AS actamt FROM `clubs` 
LEFT JOIN club_members ON clubs.id = club_members.club_id 
LEFT JOIN activity ON clubs.id = activity.club_id
GROUP BY clubs.name";
$result = mysqli_query($conn,$sql);
$clubs = array();

while($row = mysqli_fetch_assoc($result)){
    $clubs[] = $row;
}


echo json_encode($clubs);




?>