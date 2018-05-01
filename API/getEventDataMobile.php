<?php
	// Get database connection information
	include "header.php";

	// Process Input
	$json = file_get_contents('php://input');
	$obj = json_decode($json, TRUE);

	// Create an array that will later hold the information being returned
	$jsonArray = array();

	// Get user ID from the ongoing Sessions object
	$thisUserID = $_SESSION['UserID'];
	$query = "SELECT experienceID, name, expDate, hours, notes from experiences WHERE userID = '$thisUserID' ORDER BY expDate DESC";

	// Check for error in connection
	if ($conn->connect_error)
		echo $conn->connect_error . "fail whale on connection";
	// Successful connection

	// Execute the query
	$grabExp = mysqli_query($conn, $query);

	// If the result of the query has any rows of data, the query was successful
	if (mysqli_num_rows($grabExp) > 0)
	{
		// There will be a row for each experience in the databse
		while($row = mysqli_fetch_array($grabExp))
		{
			// Create array to hold all of the content of this experience
			$content = array(
				'experienceID' => $row['experienceID'],
				'name' => $row['name'],
				'expDate' => $row['expDate'],
				'hours' => $row['hours'],
				'notes' => $row['notes']
			);

			// Add array to the larger array of information
			array_push($jsonArray, $content);
		}
			// Encode the array containing the arrays of experience data
			$jsonString = json_encode($jsonArray);
			echo $jsonString;
	}

	$conn->close();
	die();
?>
