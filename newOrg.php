
        
<!DOCTYPE html>
<html>
    <head>
        
    <title>Register Your Organization</title>  
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link href="css/styles.css" rel="stylesheet">
    <link href="css/signUp.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>   
    
        
    </head>

    <body>
        
        <!-- Top Banner Start -->
		<nav class="navbar navbar-default">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
                <!-- no "collapsed" and no "aria-expanded="false"" in button class below-->
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
		        <li><a href="#" data-target="signUp" id="signUpRibbon">Sign Up</a></li>
		        <li><a href="#" data-target="login" id="loginRibbon">Login</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<!-- Top Banner End -->

            
        <section class="orgRegPage">
            <div class="inner">
                <div class="orgRegRespDiv">
                                <br>
                                <h1>Thank You</h1>
                                <h4>The Contact of Your Organization Will Receive an Email from Us Shortly</h4>
                </div>
            </div>
          </section>
        
        <!--This js bootstrap script is needed here for the navbar menu to toggle-->
        <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
        <style>
            @font-face{font-family: sanssaFont;src:url(CSS/Sansation_Regular.ttf)};
        </style>
        
         <?php
                // Handle new user signup input, insert into database, save hashed password
                require_once "dbinit.php";

                // Store username and password from form submission
                $orgName =  mysqli_real_escape_string($conn, $_POST['orgName']);
                $orgZip = mysqli_real_escape_string($conn, $_POST['orgZip']);
                $orgWebsite = mysqli_real_escape_string($conn, $_POST['orgWebsite']);
                $conName = mysqli_real_escape_string($conn, $_POST['conName']);
                $conEmail = mysqli_real_escape_string($conn, $_POST['conEmail']);

                // Check for error in connection
                if ($conn->connect_error)
                {
                    // Handle connection error
                    echo $conn->connect_error . "fail whale";
                }

                // Connection successful
                // Valid username, insert new user
                else
                {

                    // Make sql query string
                    $sql = "INSERT INTO organizations(orgName, orgZip, orgWebsite, conName, conEmail)
                                VALUES('" . $orgName . "','". $orgZip . "','" . $orgWebsite . "','" . $conName . "','" . $conEmail . "')";

                    if (!$conn->query($sql) == TRUE)
                    {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }

                    $conn->close();
                    die();
                }
        ?>
        
    </body>
</html>