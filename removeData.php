<?php

// Connect to a database
$conn = mysqli_connect('localhost', 'root', '', 'matchcalendar');

// Check for POST variable
if(isset($_POST['remove'])) {
	
	if($stmt = $conn->prepare("DELETE FROM events WHERE id = ?")){
	$stmt->bind_param("s", $_POST[remove]);
	$stmt->execute();
	
	echo 'Event Added...';
  } else {
    echo 'ERROR: '. mysqli_error($conn);
  }
}