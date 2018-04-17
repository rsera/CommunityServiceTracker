<?php
  include "header.php";

  $json = file_get_contents('php://input');
  $obj = json_decode($json, TRUE);

  $thisUserID = $_SESSION['UserID'];
  $sql = "SELECT goal, IFNULL(SUM(hours),0) AS hours FROM user LEFT JOIN experiences on user.userID = experiences.userID WHERE user.userID = ".$thisUserID. " GROUP BY user.userID";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0)
  {
    while($row = mysqli_fetch_assoc($result)){
      $val = (int)($row['hours']/$row['goal']*100);
      $val2 = (100 - $val);
      $hours = ($row['hours']);
      $goal = ($row['goal']);

			echo ("{\"hours\":".$hours.", \"goal\":".$goal.", \"blueBar\":".$val.", \"greyBar\":".$val2."}");
    }
  }

		$conn->close();
		die();
?>
