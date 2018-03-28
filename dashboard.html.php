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
								echo '<p>Current hours:'.$row['hours'].'</p>';
                echo '<span class="pull-right">'. $row['hours'].' of '.$row['goal'].'</span>';
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

						echo '<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="'.
										$val.'" aria-value-min="0" aria-valuemax="100" style="width:'.
										$val.'%">'.
										'<div class="progress-bar-title">'.$val.'% complete</div>'.
										'</div></div>';

          }
        }

      ?>

      <div class="progress">
        <div  class="progress-bar" role="progressbar" area-valuenow="<?php echo $val;?>"
        area-valuemin="0" aria-valuemax="100" style="width:<?php echo $val;?>%;">
          <div class="progress-bar-title"> <?php echo $val;?>% complete</div>
        </div>
      </div>


			<div id="addNew" class="panel">
				<div class="name"><label>Name</label><input id="newName" type="text"></input></div>
				<div class="date"><label>Date</label><input id="newDate" type="date"></input></div>
				<div class="hours"><label>Hours</label><input id="newHours" type="number"></input></div>
				<div class="more"><input id="newMore" type="button" value="+" class="left"></input></div>
				<div class="submit"><input id="newSubmit" type="button" value="Submit" class="right"></input></div>
				<div class="clearBoth"></div>
			</div>

			<!--
      <!--Add activity form
      <div id="addNew" class="panel panel-default" >
        <div class="panel-heading">Add Activity</div>
        <div class="panel-body">

          <form>
            <div class="form-group">
              <label for="newName">Name:</label>
              <input type="text" class="form-control" id="newName">
            </div>

            <label for="newDate">Date:</label>
            <div class="form-group">
                <div class='input-group date' id="newDate">
                    <input type='date' class="form-control" />
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
              <label for="comment">Activity description:</label>
              <textarea class="form-control" rows="5" id="newMore"></textarea>
            </div>

            <button type="submit" class="btn btn-default" id="newSubmit">Submit</button>
          </form>

        </div>
      </div>
    </div>

-->

    <div class="col-sm-4">
      <h2><span class="label label-default">Recent Activity</span></h2>

      <div class="panel panel-default">
        <div class="panel-body">
          <table class="table" border="1">
              <tbody>
                <tr>
                  <td>
                    <p class="header">ACM-W</strong></p>
                    <p>3/23/2018</p>
                    <p>15 hours</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="header">Habitat for Humanity</strong></p>
                    <p>3/24/2018</p>
                    <p>15 hours</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="header">Junior Knights</strong></p>
                    <p>3/25/2018</p>
                    <p>10 hours</p>
                  </td>
                </tr>
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
                <tr>
                  <td>
                    <p class="header">Zebra Coalition</p>
                    <p>911 N Mills Ave, Orlando, FL 328038</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="header">Harbor House</p>
                    <p>Orlando, FL 32868</p>
                  </td>
                </tr>
                <tr>
                  <td>
                    <p class="header">Winnie Palmer Hospital</p>
                    <p>83 W Miller St, Orlando, FL 32806</p>
                  </td>
                </tr>
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
		$("#newSubmit").on("click",function(){addExperience(false)});
		//$("#newSubmit").on("click",$("#addNew").val(""));

		// When you click on contacts, swap to the Read-Only form and show their info
		$(".contact").on("click",function(){viewContact(<?=$_SESSION['UserID']?>,this.id);});
		// When you click 'Add A New Contact', show the add contact section
		$("#AddContact").on("click",function(){
			if($("#addContactInfo").is(":hidden")){
				$(".togglePanel").toggleClass("defaultHidden");
			}
		});
		// When you click 'Delete Contact', remove the contact from the active page
		$("#DeleteContact").on("click",function(){
			if($("#addContactInfo").is(":hidden")){
				deleteContact(<?=$_SESSION['UserID']?>,$("#contactDisplay").attr("data-cid"))
			}
		});
		// When you click 'Save Contact', add the contact and display its info
		$(".addContactButton").on("click",function(){addContact(<?=$_SESSION['UserID']?>)});

		// When you click "search" it searches with what's in the box
		$("#searchButton").on("click",function(){searchContact(<?=$_SESSION['UserID']?>, $("#searchBox").val())});

		$('#myContacts h2').on("click",function(){$('#contactList button').not('.defaultHidden').show()});
	</script>
</body>

</html>
