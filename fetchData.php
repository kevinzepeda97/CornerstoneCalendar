<?php

// Connect to a database
$conn = mysqli_connect('localhost', 'root', '', 'matchcalendar');

// Check for POST variable
if(isset($_POST['event'])) {
  
	$stmt = $conn->prepare("SELECT * FROM events ORDER BY id");
	$stmt->execute();
	$result = $stmt->get_result();

	$resultArray = array();

    // Fetch Data
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) { //MYSQLI_ASSOC
			$resultArray[] = $row;
        }
		echo json_encode($resultArray);
    } else {
        echo "0 results";
    }
  }

