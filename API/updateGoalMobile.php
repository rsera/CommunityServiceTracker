<?php
	// Create database connection
	include "header.php";

	// Process input
	$json = file_get_contents('php://input');
  $obj = json_decode($json, TRUE);

	// Retreive value from decoded json object
  $goal = mysqli_real_escape_string($conn, $obj['goal']);

  // Validate the session cookies. This should be done first for all API calls.
  if (!checkSession())
  {
  	echo "invalid session";
	  return;
  }

  // Verify that the user has entered the required information
  if (!isset($goal))
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

    // Query database
    $sql = "UPDATE user SET goal='" . $goal . "' WHERE userID = ". mysqli_real_escape_string($conn, $_COOKIE['vtrakUser']);
    $result = mysqli_query($conn, $sql);

		// Result of query must be true for UPDATE to ensure success
    if ($result != TRUE)
    {
      echo "fail whale result not true";
    }
    else
	{
			// Return the information in JSON format
      echo ("{\"goal\":".$goal."}");
	}

    $conn->close();
  }
?>
