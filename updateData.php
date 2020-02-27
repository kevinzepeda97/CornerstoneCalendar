<?php

// Connect to a database
$conn = mysqli_connect('localhost', 'root', '', 'matchcalendar');

// Check for POST variable
if(isset($_POST['event'])) {

if($stmt = $conn->prepare("UPDATE events SET startDate = ?, endDate = ?, recurring = ? WHERE id = ?")){
$stmt->bind_param("ssss", $_POST[start], $_POST[end], $_POST[r], $_POST[event]);
$stmt->execute();

echo 'Event Altered...';
  } else {
    echo 'ERROR: '. mysqli_error($conn);
  }
}