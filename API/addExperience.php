<?php
	include "../header.php";
	//global $conn;
  // Verify that the user has entered a first, last, phone, and email
  if (!(isset($_POST['userID']) && isset($_POST['name']) && isset($_POST['expDate']) && isset($_POST['hours']) && isset($_POST['notes'])))
    echo "fail whale :(";

  // Establishing database connection
  if ($conn->connect_error)
  {
    echo "fail whale :(";
  }
  else {

    // Create a long query string to add the given contact into Contact table
    // Still need userID associated with this given contact.
    $sql = "INSERT INTO experiences(name, expDate, hours, notes, userID) VALUES(";
    $sql = $sql."'".mysqli_real_escape_string($conn, $_POST['name'])."', ";
    $sql = $sql."'".mysqli_real_escape_string($conn, $_POST['expDate'])."', ";
    $sql = $sql."'".mysqli_real_escape_string($conn, $_POST['hours'])."', ";
    $sql = $sql."'".mysqli_real_escape_string($conn, $_POST['notes'])."',";
	$sql = $sql.mysqli_real_escape_string($conn, $_POST['userID']).")";

    if ($result = $conn->query($sql) != TRUE)
    {
      echo "fail whale :(";
    }
    else
    {
      $end = '"}';
      $myJsonString = '{"id":"'.mysqli_insert_id($conn);
      $myJsonString = $myJsonString.'","name":"'.$_POST['name'];
      $myJsonString = $myJsonString.'","expDate":"'.$_POST['expDate'];
      $myJsonString = $myJsonString.'","hours":"'.$_POST['hours'];
      $myJsonString = $myJsonString.'","notes":"'.$_POST['notes'];
	  $myJsonString = $myJsonString.'","userID":"'.$_POST['userID'];
      $myJsonString = $myJsonString.$end;

      echo $myJsonString;
      // echo '{"id":"'.rand(0000,9999).'","nameF":"'.$_POST['nameF'].'","nameL":"'.$_POST['nameL'].'","phone":"'.$_POST['phone'].'","email":"'.$_POST['email'].'"}';
    }

    $conn->close();
  }
?>