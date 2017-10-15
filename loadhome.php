<?php

include 'db.php';

$sql = "SELECT COUNT(clubs.id) as 'clubamt', COUNT(club_members.fullname) AS 'studentamt', COUNT(activity.title) as 'activityamt', COUNT(details_clubs.type) as 'applyamt'  FROM `clubs`
LEFT JOIN club_members ON club_members.club_id = clubs.id
LEFT JOIN activity ON activity.club_id = clubs.id
LEFT JOIN details_clubs ON details_clubs.type='application'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);


echo json_encode($row);





?>