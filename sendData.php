<?php

// Connect to a database
$conn = mysqli_connect('localhost', 'root', '', 'matchcalendar');

// Check for POST variable
if(isset($_POST['e'])){

	if($_POST[r] == ''){
		$_POST[r] = NULL;
	}

	if($stmt = $conn->prepare("INSERT INTO events(eventTitle, startDate , endDate, eventDescription, evtColor, recurring) VALUES(?,?,?,?,?,?)")){
	$stmt->bind_param("ssssss", $_POST[e], $_POST[s], $_POST[end], $_POST[d], $_POST[c], $_POST[r]);
	$stmt->execute();

	echo 'Event Added...';
  } else {
    echo 'ERROR: '. mysqli_error($conn);
  }
}
