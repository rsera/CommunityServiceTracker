<?php
	include "../header.php";
	//global $conn;

  // Validate the session cookies. This should be done first for all API calls.
  if (!checkSession())
  {
  	echo "invalid session";
	return;
  }

  // Verify that the user has entered the required information
  if (!(isset($_COOKIE['vtrakUser']) && isset($_POST['orgID'])))
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

    $sql = "DELETE FROM organizations WHERE organizations.orgID =" . mysqli_real_escape_string($conn, $_POST['orgID']);

    if ($result = $conn->query($sql) != TRUE)
    {
      echo "fail whale result not true";
    }
    else
    {
      echo '{"id":"'. sanitizeXSS($_POST['orgID']) .'"}';
    }

    $conn->close();
  }
?>
