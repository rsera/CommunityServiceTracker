<?php
	include "header.php";
  //global $conn;
  
	$json = file_get_contents('php://input');
  $obj = json_decode($json, TRUE);

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

    //
    $sql = "UPDATE user SET goal='" . $goal . "' WHERE userID = ". mysqli_real_escape_string($conn, $_COOKIE['vtrakUser']);
    $result = mysqli_query($conn, $sql); 

    if ($result != TRUE)
    {
      echo "fail whale result not true";
    }
    else
	{
      // echo '{"goal":"'.$obj['goal'].'"}';
      echo ("{\"goal\":".$goal."}");
	}

    $conn->close();
  }
?>
