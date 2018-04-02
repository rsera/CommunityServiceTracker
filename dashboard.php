<?php include "header.php";
	if(!isset($_SESSION['UserID'])){
		header("location: /");
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>VTRAK</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="css/styles.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<style>
		.defaultHidden{display:none;visibility:hidden;}
		@font-face{font-family: sanssaFont;src:url(CSS/Sansation_Regular.ttf)};
		@font-face{font-family: sanssaBold;src:url(CSS/Sansation_Bold.ttf);font-weight:bold};
		body{font-family:sanssaFont;}
		#vtrakButton{font-family:sanssaFont; font-size: 25px;}
		#signUpRibbon{font-family:sanssaFont; font-size: 20px}
		#loginRibbon{font-family:sanssaFont; font-size: 20px}
		#homePageContent h1{font-family:sanssaFont;}
	</style>
</head>
<body class="myDashboard">

  <!-- Top Banner Start -->
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#" data-target="home" id="vtrakButton">vTrak</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" data-target="signUp" id="signUpRibbon">Account</a></li>
          <li><a href="#" data-target="login" id="loginRibbon">Log Out</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Top Banner End -->

  <div class="row row-eq-height">
    <div class="col-sm-4">
      <!-- Progress bar -->
      <div class="progress-bar-label">
        <h2>
          <span class="label label-default">Goal</span>

          <?php
			$thisUserID = $_SESSION['UserID'];
			$sql = "SELECT goal, IFNULL(SUM(hours),0) AS hours FROM user LEFT JOIN experiences on user.userID = experiences.userID WHERE user.userID = ".$thisUserID. " GROUP BY user.userID";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0)
			{
				while($row = mysqli_fetch_assoc($result)){
					/*echo '<p>Current hours:'.$row['hours'].'</p>';*/
        			//echo '<span class="pull-right">'. $row['hours'].' of '.$row['goal'].'</span>';
					echo '<span class="pull-right"><span id="hoursLabel">' . $row['hours'] . '</span> of <span id="goalLabel">' . $row['goal'] . '</span></span>';
				}
			}
    	?>
        </h2>
      </div>

      <?php
        $thisUserID = $_SESSION['UserID'];
        $sql = "SELECT goal, IFNULL(SUM(hours),0) AS hours FROM user LEFT JOIN experiences on user.userID = experiences.userID WHERE user.userID = ".$thisUserID. " GROUP BY user.userID";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0)
        {
          while($row = mysqli_fetch_assoc($result)){
            $val = (int)($row['hours']/$row['goal']*100);

			echo '<div class="progress"><div class="progress-bar" role="progressbar" aria-valuenow="'.$row['hours'].'" aria-value-min="0" aria-valuemax="'.$row['goal'].'" style="width:'.$val.'%">'.'<div class="progress-bar-title"></div>'.'</div></div>';
          }
        }
      ?>

      <!--Add activity-->
      <div id="addNew" class="panel panel-default" >
        <div class="panel-heading">Add Activity</div>
        <div class="panel-body">

          <!--<form>-->
            <div class="form-group">
              <label for="newName">Name:</label>
              <input type="text" class="form-control" id="newName">
            </div>

            <label for="newDate">Date:</label>
            <div class="form-group">
                <div class='input-group date'>
                    <input type='date' class="form-control" id="newDate"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

            <div class="form-group">
              <label for="newHours">Hours:</label>
              <input type="number" class="form-control" id="newHours">
            </div>

            <div class="form-group">
              <label for="comment">Notes:</label>
              <textarea class="form-control" rows="5" id="newNotes"></textarea>
            </div>

            <button type="button" class="btn btn-default" id="newSubmit">Submit</button>
          <!--</form>-->

        </div>
      </div>
    </div>


    <div class="col-sm-4">
      <h2><span class="label label-default">Recent Activity</span></h2>

      <div class="panel panel-default">
        <div class="panel-body">
          <table id="recent" class="table" border="1">
              <tbody>
				  <?php
  					$thisUserID = $_SESSION['UserID'];
  					$sql = "SELECT experienceID, name, expDate, hours FROM experiences WHERE userID = ".$thisUserID ." ORDER BY expDate DESC";
  					$result = mysqli_query($conn, $sql);

  					if (mysqli_num_rows($result) > 0)
  					{
  						while($row = mysqli_fetch_assoc($result)){
  							echo '<tr><td><p id="e' . $row['experienceID'] . '" class="header">' . $row['name'] . '</strong></p><p>' . $row['expDate'] . '</p><p>' . $row['hours'] . ' hours</p></td></tr>';
						}
  					}
					else echo '<tr><td><p id="noActivity">You have no activity.</p></td></tr>';

				?>
              </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <h2><span class="label label-default">Recommendations</span></h2>

      <div class="panel panel-default">
        <div class="panel-body">
          <table class="table" border="1">
              <tbody>
				  <?php
  					$thisUserID = $_SESSION['UserID'];
  					$sql = "SELECT orgID, orgName, orgType, orgWebsite FROM organizations INNER JOIN user ON organizations.orgZip = user.userZip AND user.userID = ".$thisUserID;
  					$result = mysqli_query($conn, $sql);

  					if (mysqli_num_rows($result) > 0)
  					{
  						while($row = mysqli_fetch_assoc($result)){
  							//echo '<div id="o'. $row['orgID'] . '" class="panel"><div class="name">' . $row['orgName'] . '</div><div class="type">' . $row['orgType'] . '</div><div class="webaddress">' . $row['orgWebsite'] . '</div></div>';
							echo '<tr><td><p id="o'. $row['orgID'] . '" class="header">' . $row['orgName'] . '</p><p>' . $row['orgWebsite'] . '</p></td></tr>';
						}
  					}
					else {
						echo '<tr><td><p id="noActivity">No organizations match your area/interests.</p></td></tr>';
					}
  				?>
              </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<script src="API/webAJAX.js"></script>
	<script>
		// When you click "submit" for new experiences, add the experience and update the recent activity list
		$("#newSubmit").on("click",function(){addExperience()});
		//$("#newSubmit").on("click",$("#addNew").val(""));

	</script>
</body>

</html>
