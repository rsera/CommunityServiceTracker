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
	$query = "SELECT orgID, orgZip, orgName from organizations WHERE approved = '1'";

	// Check for error in connection
	if ($conn->connect_error)
		echo $conn->connect_error . "fail whale on connection";
	// Successful connection

	// Execute the query
	$grabRec = mysqli_query($conn, $query);

	// If the result of the query has any rows of data, the query was successful
	if (mysqli_num_rows($grabRec) > 0)
	{
		// There will be a row for each organizationb in the databse
		while($row = mysqli_fetch_array($grabRec))
		{
			// Create array to hold all of the content of this organization
			$content = array(
				'orgID' => $row['orgID'],
				'orgName' => $row['orgName'],
				'orgZip' => $row['orgZip']
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
