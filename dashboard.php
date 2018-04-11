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
	<link href="jquery-ui.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="jquery-ui.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
          <li class="drowpdown"><a class="dropbtn" id="signUpRibbon">Account</a>
		  <div id="myDropdown" class="dropdown-content defaultHidden">
		    <a href="#" id="goalDrop">Update Goal</a>
		    <a href="#" id="pwDrop">Change Password</a>
		  </div></li>
          <li><a href="logout.php" data-target="login" id="loginRibbon">Log Out</a></li>
		  <!--<button type="submit" class="btn btn-default navbar-btn"><a href="logout.php">Sign Out</a></button>-->
        </ul>
      </div>
    </div>
  </nav>
  <!-- Top Banner End -->



  <div id="fireworks" style="display:none">
  <style>
    #firework{background:#000;margin:0;}
    canvas{cursor: crosshair;display: block;}
  </style>
    <canvas id="canvas"></canvas>
    <script src="fireworks.js"></script>
	</div>

  <div class="row-eq-height" id="content">
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
					echo '<span id="hoursOfGoal" class="pull-right"><span id="hoursLabel">' . $row['hours'] . '</span> of <span id="goalLabel">' . $row['goal'] . ' hours</span></span>';

					if($row['hours'] >= $row['goal'])
					{
						echo '<script>$(document).ready(function(){$("#goalCongrats").dialog();});</script>';
					}
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
        <div class="panel-heading">Add Activity (*=required)</div>
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

			<span>
            <div class="form-group">
              <label for="newHours">Hours:</label>
              <input type="number" class="form-control" id="newHours">
            </div>
			</span>

            <div class="form-group">
              <label for="comment">Notes:</label>
              <textarea class="form-control" rows="4" id="newNotes"></textarea>
            </div>

            <button type="button" class="btn btn-default" id="newSubmit">Submit</button>
          <!--</form>-->

        </div>
      </div>
    </div>


    <div class="col-sm-4">

      <h2><span class="label label-default">Recent Activity</span></h2>

	  <div>
		<input id="searchBox" type="text" class="form-control" placeholder="Search" style="margin-bottom:20px">
		<!--<button id="searchButton" type="button" class="btn btn-default">Search</button>-->
	  </div>


      <div class="panel panel-default">
        <div class="panel-body pre-scrollable" style="max-height: 75vh">
          <table id="recent" class="table" border="1">
              <tbody>
				  <?php
  					$thisUserID = $_SESSION['UserID'];
  					$sql = "SELECT experienceID, name, expDate, hours, notes FROM experiences WHERE userID = ".$thisUserID ." ORDER BY expDate DESC";
  					$result = mysqli_query($conn, $sql);

  					if (mysqli_num_rows($result) > 0)
  					{
  						while($row = mysqli_fetch_assoc($result)){
  							echo '<tr id="e' . $row['experienceID'] . '" data-note="'.$row['notes'].'"><td><p class="header">' . $row['name'] . '</strong></p><p>' . $row['expDate'] . '</p><p>' . $row['hours'] . ' hours</p><p>' . $row['notes'] . '</p></td></tr>';
						}
						echo '<tr id="noActivity" class="defaultHidden"><td><p>No activity to show.</p></td></tr>';
  					}
					else echo '<tr id="noActivity"><td><p>No activity to show.</p></td></tr>';

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
						echo '<tr><td><p id="noRec">No organizations match your area/interests.</p></td></tr>';
					}
  				?>
              </tbody>
          </table>
        </div>
      </div>
    </div>

	<div id="goalCongrats" title="Update Goal" style="display:none">
		<p> Congratulations! You've met your goal!</p>
		<label=>Keeping going? Enter your new goal</label>
		<input id="newGoalCongrats" type="text" placeholder="New Goal">
		<input id="submitNewGoalCongrats" type="goalSubmit" class="signUpButton" value="Submit">
	</div>
	<div id="goalDialog" title="Update Goal" style="display:none">
		<label for="newGoal">Enter your new goal</label>
		<input id="newGoal" type="text" placeholder="New Goal">
		<input id="submitNewGoal" type="goalSubmit" class="signUpButton" value="Submit">
	</div>
	<div id="pwDialog" title="Change Password" style="display:none">
		<label for="newGoal">Enter your new password</label>
		<input id="password1" class="passwordBox" type="password" placeholder=" Password" name="PWHash" required>
		<input id="password2" class="passwordBox" type="password" placeholder=" Retype Password" name="PWHash2" required>
		<input id="submitNewGoal" type="goalSubmit" class="signUpButton" value="Submit">
	</div>

  </div>

	<!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>-->
	<script src="API/webAJAX.js"></script>
	<script>
		// When you click "submit" for new experiences, add the experience and update the recent activity list
		$("#newSubmit").on("click",function(){addExperience()});

		// Clicking the "change password" or "update goal" options pulls up their dialogs
		$("#goalDrop").on("click",function(){$("#goalDialog").dialog()});
		$("#pwDrop").on("click",function(){$("#pwDialog").dialog()});

		// Goal can be changed with the dropdown from account or the dialog that pops up when you reach your goal
		$("#submitNewGoal").on("click",function(){$("#goalDialog").dialog("close");updateGoal()});
		$("#submitNewGoalCongrats").on("click",function(){$("#goalCongrats").dialog("close");updateGoal()});
		$("#goalDialog").keyup(function(event){if(event.keyCode === 13)$("#goalDialog").dialog("close");updateGoal()});
		$("#goalCongrats").keyup(function(event){if(event.keyCode === 13)$("#goalCongrats").dialog("close");updateGoal()});

		// close the dialog when the user clicks on update password
		$("#submitNewPW").on("click",function(){$("#pwDialog").dialog("close")});

		//
		function searchExperiences(searchTerm){
			$("#recent tr").not("#noActivity").each(
				function(){
					var name = $(this).find(".header").html();
					var note = $(this).attr("data-note");
					var inName = name.toLowerCase().includes(searchTerm.toLowerCase());
					var inNote = note.toLowerCase().includes(searchTerm.toLowerCase());
					$(this).toggle(inName || inNote);
			 	}
			);

			if($("#recent tr:visible").not("#noActivity").length == 0)
			{
				$("#noActivity").removeClass("defaultHidden");
			}
			else {
				if($("#noActivity").not(":hidden"))
					$("#noActivity").addClass("defaultHidden");
			}

		}
		$("#searchBox").keyup(function(e){searchExperiences(this.value)});

		// Toggle dropdown menu when "account is clicked"
		// Close the dropdown menu if the user clicks anywhere else
		window.onclick = function(event) {
			if (event.target.matches('#signUpRibbon')) {
				$("#myDropdown").toggleClass("defaultHidden")
			}
			else {
				if($(".signUpPage").not(":hidden"))
				$("#myDropdown").addClass("defaultHidden")
			}
		}

	</script>
</body>

</html>
