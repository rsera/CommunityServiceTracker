<?php
	include "header.php";
	//global $conn;

	// Store username and password from form submission
	$json = file_get_contents('php://input');
	$obj = json_decode($json, TRUE);

  // Validate the session cookies. This should be done first for all API calls.
  if (!checkSession())
  {
  	echo "invalid session";
		return;
  }

  // Verify that the user has entered the required information
  if (!(isset($_COOKIE['vtrakUser']) && isset($obj['name']) && isset($obj['expDate']) && isset($obj['hours']) && isset($obj['notes'])))
  {
    echo "fail whale isset";
		return;
  }

  // Establishing database connection
  if ($conn->connect_error)
  {
    echo "fail whale conn";
		return;
  }
  else {
		// Grab variables from POST object
		$name = mysqli_real_escape_string($conn, $obj['name']);
		$expDate = mysqli_real_escape_string($conn, $obj['expDate']);
		$hours = mysqli_real_escape_string($conn, $obj['hours']);
		$notes = mysqli_real_escape_string($conn, $obj['notes']);
		$cookie = mysqli_real_escape_string($conn, $_COOKIE['vtrakUser']);

		$query = "INSERT INTO experiences(name, expDate, hours, notes, userID)
						VALUES('$name', '$expDate' , '$hours' , '$notes' , '$cookie')";
						
    /* old method
    $sql = "INSERT INTO experiences(name, expDate, hours, notes, userID) VALUES(";
    $sql = $sql."'".mysqli_real_escape_string($conn, $obj['name'])."', ";
    $sql = $sql."'".mysqli_real_escape_string($conn, $obj['expDate'])."', ";
    $sql = $sql."'".mysqli_real_escape_string($conn, $obj['hours'])."', ";
    $sql = $sql."'".mysqli_real_escape_string($conn, $obj['notes'])."',";
	$sql = $sql.mysqli_real_escape_string($conn, $_COOKIE['vtrakUser']).")";*/

    if ($result = $conn->query($query) != TRUE)
    {
      echo "fail whale result not true";
    }
		else
		{
			echo "inserted!";
		}
		/*
    else
    {
      $end = '"}';
      $myJsonString = '{"id":"'.mysqli_insert_id($conn);
      $myJsonString = $myJsonString.'","name":"'.$obj['name'];
      $myJsonString = $myJsonString.'","expDate":"'.$obj['expDate'];
      $myJsonString = $myJsonString.'","hours":"'.$obj['hours'];
      $myJsonString = $myJsonString.'","notes":"'.$obj['notes'];
	  $myJsonString = $myJsonString.'","userID":"'.$_COOKIE['vtrakUser'];
      $myJsonString = $myJsonString.$end;

      echo $myJsonString;
      // echo '{"id":"'.rand(0000,9999).'","nameF":"'.$_POST['nameF'].'","nameL":"'.$_POST['nameL'].'","phone":"'.$_POST['phone'].'","email":"'.$_POST['email'].'"}';
    }*/

    $conn->close();
  }
?>
