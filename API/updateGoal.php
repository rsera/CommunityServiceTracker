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
  if (!isset($_POST['goal']))
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
    $sql = "UPDATE user SET goal='" . mysqli_real_escape_string($conn, $_POST['goal']) . "' WHERE userID = ". mysqli_real_escape_string($conn, $_COOKIE['vtrakUser']);

    if ($result = $conn->query($sql) != TRUE)
    {
      echo "fail whale result not true";
    }
    else
	{
      echo '{"goal":"'.$_POST['goal'].'"}';
	}

    $conn->close();
  }
?>
