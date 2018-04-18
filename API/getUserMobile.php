<?php
	include "header.php";

	// Process Input
	$json = file_get_contents('php://input');
	$obj = json_decode($json, TRUE);
	$jsonArray = array();

	$thisUserID = $_SESSION['UserID'];
	$query = "SELECT username from user WHERE UserID = '$thisUserID'";

	// Check for error in connection
	if ($conn->connect_error)
		echo $conn->connect_error . "fail whale on connection";
	// Successful connection

	$grabName = mysqli_query($conn, $query);

	if(mysqli_num_rows($grabName) > 0)
	{
		while($row = mysqli_fetch_assoc($grabName)){
			$val = $row['username'];
			echo $val;
		}
	}

	/*
	if (mysqli_num_rows($grabName) > 0)
	{
		while($row = mysqli_fetch_array($grabName))
		{
			$content = array('username' => $row['username']);
		}
		array_push($jsonArray, $content);

		$jsonString = json_encode($jsonArray);
		echo $jsonString;
	}*/

	$conn->close();
	die();
?>
