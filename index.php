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
		</section>
		<!-- Splash Screen -->


		<!-- SignUp Page -->
		<section class="signUpPage <?php if($default!="signup")echo "defaultHidden"?>">
			<div class="inner">
				<div id="signUpDiv" class="signUpDiv">
					<form method="post" action="newUser.php">
						<h1>Sign Up</h1>
						<?php if($error!=""&&$default=="signup")echo $error;?>
						<input id="firstname" class="usernameBox" type="text" placeholder=" First Name" name="FName" required value="<?=$fname?>"><br />
						<input id="lastname" class="usernameBox" type="text" placeholder=" Last Name" name="LName" required value="<?=$lname?>"><br />
						<input id="zip" class="usernameBox" type="text" placeholder=" Zip Code" name="zip" required value=""><br />
						<input id="username" class="usernameBox" type="text" placeholder=" Username" name="username" required value="<?=$username?>"><br />
						<input id="goal" class="usernameBox" type="text" placeholder=" Set Your Goal (in hours)" name="goal" required value="<?=$goal?>"><br />
						<input id="password" class="passwordBox" type="password" placeholder=" Password" name="PWHash" required><br />
						<input id="password" class="passwordBox" type="password" placeholder=" Retype Password" name="PWHash2" required><br />
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
						<h1>Login</h1>
						<?php if($error!=""&&$default=="login")echo $error;?>
						<input id="username" class="usernameBox" type="text" placeholder=" Username" name="username" required value="<?=$username?>"> <br />
						<input id="password" class="passwordBox" type="password" placeholder=" Password" name="password" required> <br />
						<input class="buttons" type="submit" value="Login">
						<h3>New member? <a href="#" data-target="signUp" class="signUpfromLogin"><strong>Sign Up</strong></a></h3>
					</form>
				</div>
			</div>
		</section>
		<!-- login Page End -->

	<script>
		$(".getStarted").on("click",function(){$(".signUpPage").removeClass("defaultHidden"); $(".splashScreen").addClass("defaultHidden")})
		$("#loginButtonfromSignUp").on("click",function(){$(".loginPage").removeClass("defaultHidden"); $(".signUpPage").addClass("defaultHidden")})
		$(".signUpfromLogin").on("click",function(){$(".signUpPage").removeClass("defaultHidden"); $(".loginPage").addClass("defaultHidden")})
		$("#vtrakButton").on("click",function(){if($(".splashScreen").is(":hidden"))$(".splashScreen").removeClass("defaultHidden");
			$(".loginPage").addClass("defaultHidden"); $(".signUpPage").addClass("defaultHidden")})
		$("#signUpRibbon").on("click",function(){if($(".signUpPage").is(":hidden"))$(".signUpPage").removeClass("defaultHidden");
			$(".loginPage").addClass("defaultHidden"); $(".splashScreen").addClass("defaultHidden")})
		$("#loginRibbon").on("click",function(){if($(".loginPage").is(":hidden"))$(".loginPage").removeClass("defaultHidden");
			$(".splashScreen").addClass("defaultHidden"); $(".signUpPage").addClass("defaultHidden")})


	</script>
	</body>
</html>
