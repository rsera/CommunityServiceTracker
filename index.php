<!DOCTYPE html>
<html>
	<head>
		<title>VTRAK</title>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="css/styles.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
		<style>
			.defaultHidden{display:none;visibility:hidden;}
			@font-face{font-family: sanssaFont;src:url(/CSS/Sansation_Regular.ttf)};
			@font-face{font-family: sanssaBold;src:url(/CSS/Sansation_Bold.ttf);font-weight:bold};
			body{font-family:sanssaFont;}
			#vtrakButton{font-family:sanssaFont;}
			#signUpRibbon{font-family:sanssaFont;}
			#loginRibbon{font-family:sanssaFont;}
			#homePageContent h1{font-family:sanssaFont;}
		</style>
	</head>
	<body>
		<?php
			if(isset($_GET['default'])){$default=$_GET['default'];}else{$default="splash";}
			if(isset($_GET['fname'])){$fname=$_GET['fname'];}else{$fname="";}
			if(isset($_GET['lname'])){$lname=$_GET['lname'];}else{$lname="";}
			if(isset($_GET['username'])){$username=$_GET['username'];}else{$username="";}
			if(isset($_GET['goal'])){$goal=$_GET['goal'];}else{$goal="";}
			if(isset($_GET['error'])){$error=$_GET['error'];}else{$error="";}
		?>

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
		        <li><a href="#" data-target="signUp" id="signUpRibbon">Sign Up</a></li>
		        <li><a href="#" data-target="login" id="loginRibbon">Login</a></li>
				<li><a href="#" data-target="register" id="orgRibbon">Organizations</a></li>
		      </ul>
		    </div>
		  </div>
		</nav>
		<!-- Top Banner End -->

		<!-- Splash Screen -->
		<section class="container homePageContainer splashScreen <?php if($default!="splash")echo "defaultHidden"?>">
			<div class="row">
				<div class="col-lg-12">
					<div id="homePageContent" class="homePageContent">
						<h1>vTrak</h1>
						<h3>Track your hours spent volunteering</h3>
						<hr>
						<a class="btn btn-default btn-lg getStarted" data-target="signUp">Get Started!</a>
					</div>
				</div>
			</div>
			
			<hr class="featurette-divider">
			<div class="container marketing">
		      <!-- Three columns of text below the "Get started!" -->
		      <div class="row">
		        <div class="col-lg-4">
		          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
		          <h2>Heading</h2>
		          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
		          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
		        </div><!-- /.col-lg-4 -->
		        <div class="col-lg-4">
		          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
		          <h2>Heading</h2>
		          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>
		          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
		        </div><!-- /.col-lg-4 -->
		        <div class="col-lg-4">
		          <img class="img-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
		          <h2>Heading</h2>
		          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
		          <p><a class="btn btn-default" href="#" role="button">View details »</a></p>
		        </div><!-- /.col-lg-4 -->
		      </div><!-- /.row -->


		      <!-- START THE FEATURETTES -->

		      <hr class="featurette-divider">

		      <div class="row featurette">
		        <div class="col-md-7">
		          <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span></h2>
		          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
		        </div>
		        <div class="col-md-5">
		          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDUwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzUwMHg1MDAvYXV0bwpDcmVhdGVkIHdpdGggSG9sZGVyLmpzIDIuNi4wLgpMZWFybiBtb3JlIGF0IGh0dHA6Ly9ob2xkZXJqcy5jb20KKGMpIDIwMTItMjAxNSBJdmFuIE1hbG9waW5za3kgLSBodHRwOi8vaW1za3kuY28KLS0+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj48IVtDREFUQVsjaG9sZGVyXzE2MmQ1YjY0MjMzIHRleHQgeyBmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MjVwdCB9IF1dPjwvc3R5bGU+PC9kZWZzPjxnIGlkPSJob2xkZXJfMTYyZDViNjQyMzMiPjxyZWN0IHdpZHRoPSI1MDAiIGhlaWdodD0iNTAwIiBmaWxsPSIjRUVFRUVFIi8+PGc+PHRleHQgeD0iMTg1LjEyNSIgeT0iMjYxLjEiPjUwMHg1MDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
		        </div>
		      </div>

		      <hr class="featurette-divider">

		      <div class="row featurette">
		        <div class="col-md-7 col-md-push-5">
		          <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
		          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
		        </div>
		        <div class="col-md-5 col-md-pull-7">
		          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDUwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzUwMHg1MDAvYXV0bwpDcmVhdGVkIHdpdGggSG9sZGVyLmpzIDIuNi4wLgpMZWFybiBtb3JlIGF0IGh0dHA6Ly9ob2xkZXJqcy5jb20KKGMpIDIwMTItMjAxNSBJdmFuIE1hbG9waW5za3kgLSBodHRwOi8vaW1za3kuY28KLS0+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj48IVtDREFUQVsjaG9sZGVyXzE2MmQ1YjVmYzI0IHRleHQgeyBmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MjVwdCB9IF1dPjwvc3R5bGU+PC9kZWZzPjxnIGlkPSJob2xkZXJfMTYyZDViNWZjMjQiPjxyZWN0IHdpZHRoPSI1MDAiIGhlaWdodD0iNTAwIiBmaWxsPSIjRUVFRUVFIi8+PGc+PHRleHQgeD0iMTg1LjEyNSIgeT0iMjYxLjEiPjUwMHg1MDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
		        </div>
		      </div>

		      <hr class="featurette-divider">

		      <div class="row featurette">
		        <div class="col-md-7">
		          <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
		          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>
		        </div>
		        <div class="col-md-5">
		          <img class="featurette-image img-responsive center-block" data-src="holder.js/500x500/auto" alt="500x500" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNTAwIiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDUwMCA1MDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzUwMHg1MDAvYXV0bwpDcmVhdGVkIHdpdGggSG9sZGVyLmpzIDIuNi4wLgpMZWFybiBtb3JlIGF0IGh0dHA6Ly9ob2xkZXJqcy5jb20KKGMpIDIwMTItMjAxNSBJdmFuIE1hbG9waW5za3kgLSBodHRwOi8vaW1za3kuY28KLS0+PGRlZnM+PHN0eWxlIHR5cGU9InRleHQvY3NzIj48IVtDREFUQVsjaG9sZGVyXzE2MmQ1YjVkNmQyIHRleHQgeyBmaWxsOiNBQUFBQUE7Zm9udC13ZWlnaHQ6Ym9sZDtmb250LWZhbWlseTpBcmlhbCwgSGVsdmV0aWNhLCBPcGVuIFNhbnMsIHNhbnMtc2VyaWYsIG1vbm9zcGFjZTtmb250LXNpemU6MjVwdCB9IF1dPjwvc3R5bGU+PC9kZWZzPjxnIGlkPSJob2xkZXJfMTYyZDViNWQ2ZDIiPjxyZWN0IHdpZHRoPSI1MDAiIGhlaWdodD0iNTAwIiBmaWxsPSIjRUVFRUVFIi8+PGc+PHRleHQgeD0iMTg1LjEyNSIgeT0iMjYxLjEiPjUwMHg1MDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4=" data-holder-rendered="true">
		        </div>
		      </div>

		      <hr class="featurette-divider">
		</section>
		<!-- Splash Screen -->

		<!-- SignUp Page -->
		<section class="signUpPage <?php if($default!="signup")echo "defaultHidden"?>">
			<div class="inner">
				<div id="signUpDiv" class="signUpDiv">
					<form method="post" action="newUser.php">
						<h1>Sign Up</h1><br>
						<?php if($error!=""&&$default=="signup")echo $error.'<br/>';?>
						<span>First name</span>
						<input id="firstname" class="usernameBox" type="text" name="FName" required value="<?=$fname?>"><br /><br />
						<span>Last name</span>
						<input id="lastname" class="usernameBox" type="text"  name="LName" required value="<?=$lname?>"><br /><br />
						<span>Zip code</span>
						<input id="zipS" class="usernameBox" type="text"  name="zip" required value=""><br /><br />
						<span>Username</span>
						<input id="username" class="usernameBox" type="text" name="username" required value="<?=$username?>"><br /><br />
						<span>Goal in Hours</span>
						<input id="goal" class="usernameBox" type="text" name="goal" required value="<?=$goal?>"><br /><br />
						<span>Password</span>
						<input id="passwordS1" class="passwordBox" type="password" name="PWHash" required><br /><br />
						<span>Verify password</span>
						<input id="passwordS2" class="passwordBox" type="password" name="PWHash2" required><br /><br />
						<input type="submit" class="signUpButton" value="Sign Up">
						<h3>Existing member? <a href="#" data-target="login" id="loginButtonfromSignUp"><strong>Login</strong></a></h3>
					</form>
				</div>
			</div>
		</section>
		<!-- SignUp Page End -->


		<!-- login Page Start -->
		<section class="loginPage <?php if($default!="login")echo "defaultHidden"?>">
			<div class="inner">
				<div id="loginDiv" class="loginDiv">
					<form method="post" action="verifySignIn.php">
						<h1>Login</h1> <br>
						<?php if($error!=""&&$default=="login")echo $error.'<br/>';?>
						<span>Username</span>
                        <input id="zipL" class="usernameBox" type="text" name="username" required value="<?=$username?>"> <br> <br>

                        <span>Password</span>
                        <input id="password" class="passwordBox" type="password" name="password" required> <br>

						<input class="buttons" type="submit" value="Login">
						<h3>New member? <a href="#" data-target="signUp" class="signUpfromLogin"><strong>Sign Up</strong></a></h3>
					</form>
				</div>
			</div>
		</section>
		<!-- login Page End -->


        <!-- Organization Registration Page Start -->
        <section class="orgRegPage <?php if($default!="register")echo "defaultHidden"?>">
            <div class="inner">
                <div id ="orgRegDiv" class="orgRegDiv">
                    <form method="post" action="newOrg.php">  <!--optional php file name -->
                        <br>
                        <h1>Welcome</h1>
                        <h3>Tell us about your organization</h3><br />
                        <span>Organization Name</span>
                        <input id="orgname" class="usernameBox" type="text" name="orgName" required value><br /><br />
                        <span>Zip Code</span>
                        <input id="zipO" class="usernameBox" type="text" name="orgZip" required value><br /><br />
                        <span>Website Address</span>
                        <input id="website" class="usernameBox" type="text" name="orgWebsite" required value> <br /><br />
                        <span>Contact Name</span>
                        <input id="contactname" class="usernameBox" type="text" name="conName" required value><br /><br />
                        <span>Contact Email</span>
                        <input id="contactemail" class="usernameBox" type="text" name="conEmail" required value> <br /><br />
                        <input type="submit" class="signUpButton" value="Register">
                    </form>
                </div>
            </div>
        </section>


	<script>
		$(".getStarted").on("click",function(){$(".signUpPage").removeClass("defaultHidden");
        $(".splashScreen").addClass("defaultHidden");
        $(".orgRegPage").addClass("defaultHidden")})


		$("#loginButtonfromSignUp").on("click",function(){$(".loginPage").removeClass("defaultHidden ");
        $(".signUpPage").addClass("defaultHidden");
        $(".orgRegPage").addClass("defaultHidden")})


        $("#orgRibbon").on("click",function(){$(".orgRegPage").removeClass("defaultHidden");$(".loginPage").addClass("defaultHidden");$(".splashScreen").addClass("defaultHidden");
        	$(".signUpPage").addClass("defaultHidden")})


		$(".signUpfromLogin").on("click",function(){$(".signUpPage").removeClass("defaultHidden orgRegPage"); $(".loginPage").addClass("defaultHidden"); $(".orgRegPage").addClass("defaultHidden")})

		$("#vtrakButton").on("click",function(){if($(".splashScreen").is(":hidden"))$(".splashScreen").removeClass("defaultHidden");
			$(".loginPage").addClass("defaultHidden");
            $(".signUpPage").addClass("defaultHidden");
            $(".orgRegPage").addClass("defaultHidden")})

		$("#signUpRibbon").on("click",function(){if($(".signUpPage").is(":hidden"))$(".signUpPage").removeClass("defaultHidden");
			$(".loginPage").addClass("defaultHidden"); $(".splashScreen").addClass("defaultHidden");
            $(".orgRegPage").addClass("defaultHidden")})

		$("#loginRibbon").on("click",function(){if($(".loginPage").is(":hidden"))$(".loginPage").removeClass("defaultHidden");
			$(".splashScreen").addClass("defaultHidden"); $(".signUpPage").addClass("defaultHidden");
            $(".orgRegPage").addClass("defaultHidden")})


	</script>
	</body>
</html>
