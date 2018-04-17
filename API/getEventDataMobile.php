<?php
	include "header.php";

	// Process Input
	$json = file_get_contents('php://input');
	$obj = json_decode($json, TRUE);
	$jsonArray = array();

	$thisUserID = $_SESSION['UserID'];
	$query = "SELECT experienceID, name, expDate, hours, notes from experiences WHERE userID = '$thisUserID'";

	// Check for error in connection
	if ($conn->connect_error)
		echo $conn->connect_error . "fail whale on connection";
	// Successful connection

	$grabExp = mysqli_query($conn, $query);

	if (mysqli_num_rows($grabExp) > 0)
	{
		while($row = mysqli_fetch_array($grabExp))
		{
			$content = array(
				'experienceID' => $row['experienceID'],
				'name' => $row['name'],
				'expDate' => $row['expDate'],
				'hours' => $row['hours'],
				'notes' => $row['notes']
			);

			array_push($jsonArray, $content);
		}

			$jsonString = json_encode($jsonArray);
			echo $jsonString;
	}
		/*$row = mysql_fetch_object($grabExp);
		$names = $row->name;
		$expDates = $row->expDate;
		$hours = $row->hours;
		$notes = $row->notes;*/


	$conn->close();
	die();
?>
