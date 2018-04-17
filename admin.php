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

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>


	<style>
		.defaultHidden{display:none;visibility:hidden;}
		@font-face{font-family: sanssaFont;src:url(CSS/Sansation_Regular.ttf)};
		@font-face{font-family: sanssaBold;src:url(CSS/Sansation_Bold.ttf);font-weight:bold};
		body{font-family:sanssaFont;}
		#vtrakButton{font-family:sanssaFont; font-size: 25px;}
		#signUpRibbon{font-family:sanssaFont; font-size: 20px}
		#loginRibbon{font-family:sanssaFont; font-size: 20px}
		#homePageContent h1{font-family:sanssaFont;}
		#acceptAdmin{
			margin-bottom: 5px;
			margin-left: 5px;
			background-color: #006600;
			color: white;
			font-family: sanssaFont;
		}

		#declineAdmin{
			margin-bottom: 5px;
			margin-left: 5px;
			background-color: #cc0000;
			color: white;
			font-family: sanssaFont;
		}
		#acceptOrg{
			margin-bottom: 5px;
			margin-left: 5px;
			background-color: #006600;
			color: white;
			font-family: sanssaFont;
		}

		#declineOrg{
			margin-bottom: 5px;
			margin-left: 5px;
			background-color: #cc0000;
			color: white;
			font-family: sanssaFont;
		}

		.label-default{background-color:#4d4d4d;}

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
          <li><a href="#" id="loginRibbon">Log Out</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Top Banner End -->

	<div class="col-sm-3">
	</div>

	<!--Begin ORG scrollable-->
	<div class="col-sm-3">

		<h2><span class="label label-default">Pending Organizations</span></h2>

		<div class="panel panel-default">
			<div class="panel-body pre-scrollable" style="max-height: 75vh">
				<table id="orgreqs" class="table" border="1">
					<tbody>
						<?php
	    					$thisUserID = $_SESSION['UserID'];
	    					$sql = "SELECT orgName, orgWebsite, conName, conEmail FROM organizations WHERE approved = 0";
	    					$result = mysqli_query($conn, $sql);

	    					if (mysqli_num_rows($result) > 0)
	    					{
	    						while($row = mysqli_fetch_assoc($result)){
	    							echo '<tr class="myRequests"><td><p class="myOrgs">' . $row['orgName']. '<br>'. $row['orgWebsite'] .'<br>'. $row['conName'].'<br>'.$row['conEmail'].'<br></p>
											<button id="acceptOrg" type="button" class="btn btn-primary btn-md">Accept</button>
											<button id="declineOrg" type="button" class="btn btn-primary btn-md">Decline</button>
										</td>
									</tr>';
	  						}
	    					}
	 	  				?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
	<!--End ORG scrollable-->

	<!--Begin ADMIN scrollable-->
	<div class="col-sm-3">

		<h2><span class="label label-default">Admin Requests</span></h2>

		<div class="panel panel-default">
			<div class="panel-body pre-scrollable" style="max-height: 75vh">
				<table id="adminreqs" class="table" border="1">
					<tbody>
						<tr class="myRequests">
							<td>
								<p class="myAdmins">
									Niel Gaiman<br>
									Username: nielg<br>
								</p>
								<button id="acceptAdmin" type="button" class="btn btn-primary btn-md">Accept</button>
								<button id="declineAdmin" type="button" class="btn btn-primary btn-md">Decline</button>
								<hr>
							</td>
						</tr>
						<!-- End of one entry in the table-->

						<!-- Beginning of one entry in the table-->
						<tr class="myRequests">
							<td>
								<p class="myAdmins">
									Terry Pratchett<br>
									Username: tpratchett<br>
								</p>
								<button id="acceptAdmin" type="button" class="btn btn-primary btn-md">Accept</button>
								<button id="declineAdmin" type="button" class="btn btn-primary btn-md">Decline</button>
								<hr>
							</td>
						</tr>
						<!-- End of one entry in the table-->
						<!-- Beginning of one entry in the table-->
						<tr class="myRequests">
							<td>
								<p class="myAdmins">
									Michael Ende<br>
									Username: michaele<br>
								</p>
								<button id="acceptAdmin" type="button" class="btn btn-primary btn-md">Accept</button>
								<button id="declineAdmin" type="button" class="btn btn-primary btn-md">Decline</button>
								<hr>
							</td>
						</tr>
						<!-- End of one entry in the table-->

						<!-- Beginning of one entry in the table-->
						<tr class="myRequests">
							<td>
								<p class="myAdmins">
									Friedrich Nietzsche<br>
									Username: nietzsche<br>
								</p>
								<button id="acceptAdmin" type="button" class="btn btn-primary btn-md">Accept</button>
								<button id="declineAdmin" type="button" class="btn btn-primary btn-md">Decline</button>
								<hr>
							</td>
						</tr>
						<!-- End of one entry in the table-->

						<!-- Beginning of one entry in the table-->
						<tr class="myRequests">
							<td>
								<p class="myAdmins">
									Herman Hesse<br>
									Username: hhesse<br>
								</p>
								<button id="acceptAdmin" type="button" class="btn btn-primary btn-md">Accept</button>
								<button id="declineAdmin" type="button" class="btn btn-primary btn-md">Decline</button>
								<hr>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!--End ADMIN scrollable-->

	<div class="col-sm-3">
	</div>


</body>

</html>
