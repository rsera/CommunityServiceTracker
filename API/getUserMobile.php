<?php
	include "header.php";

	// Process Input
	$json = file_get_contents('php://input');
	$obj = json_decode($json, TRUE);

	// Create an array that will later hold the information being returned
	$jsonArray = array();

	// Get user ID from the ongoing Sessions object
	$thisUserID = $_SESSION['UserID'];
	$query = "SELECT username from user WHERE UserID = '$thisUserID'";

	// Check for error in connection
	if ($conn->connect_error)
		echo $conn->connect_error . "fail whale on connection";
	// Successful connection

	// Execute the query
	$grabName = mysqli_query($conn, $query);

	// If the result of the query has any rows of data, the query was successful
	if(mysqli_num_rows($grabName) > 0)
	{
		// There will be a single row for the name of the user
		while($row = mysqli_fetch_assoc($grabName)){
			$val = $row['username'];
			echo $val;
		}
	}

	// End the connection
	$conn->close();
	die();
?>
