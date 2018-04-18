<?php
	include "header.php";

	// Process Input
	$json = file_get_contents('php://input');
	$obj = json_decode($json, TRUE);
	$jsonArray = array();

	$thisUserID = $_SESSION['UserID'];
	$query = "SELECT orgID, orgZip, orgName from organizations WHERE approved = '1'";

	// Check for error in connection
	if ($conn->connect_error)
		echo $conn->connect_error . "fail whale on connection";
	// Successful connection

	$grabRec = mysqli_query($conn, $query);

	if (mysqli_num_rows($grabRec) > 0)
	{
		while($row = mysqli_fetch_array($grabRec))
		{
			$content = array(
				'orgID' => $row['orgID'],
				'orgName' => $row['orgName'],
				'orgZip' => $row['orgZip']
			);

			array_push($jsonArray, $content);
		}

			$jsonString = json_encode($jsonArray);
			echo $jsonString;
	}

	$conn->close();
	die();
?>
