<?php

include 'db.php';


$sql = "SELECT * FROM advisors";
$result = mysqli_query($conn,$sql);
$advisors = array();

while($row = mysqli_fetch_assoc($result)){
    $advisors[] = $row;
}

echo json_encode($advisors);

?>