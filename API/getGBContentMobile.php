<?php
  // Get database connection information
  include "header.php";

  // Recieve input
  $json = file_get_contents('php://input');
  $obj = json_decode($json, TRUE);

  // Get the user ID from the sessions object to use in query
  $thisUserID = $_SESSION['UserID'];
  $sql = "SELECT goal, IFNULL(SUM(hours),0) AS hours FROM user LEFT JOIN experiences on user.userID = experiences.userID WHERE user.userID = ".$thisUserID. " GROUP BY user.userID";

  // Execute query
  $result = mysqli_query($conn, $sql);

  // If the result of the query has rows, the query was successful
  if (mysqli_num_rows($result) > 0)
  {
    while($row = mysqli_fetch_assoc($result)){
      $val = (int)($row['hours']/$row['goal']*100);
      $val2 = (100 - $val);
      $hours = ($row['hours']);
      $goal = ($row['goal']);

      // Can style information to be returned in JSON format, echo returns the data
			echo ("{\"hours\":".$hours.", \"goal\":".$goal.", \"blueBar\":".$val.", \"greyBar\":".$val2."}");
    }
  }

  // End connection to database  
	$conn->close();
	die();
?>
