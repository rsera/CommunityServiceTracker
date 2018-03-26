<?php
	include "header.php";

	// Store username and password from form submission
	$user =  $_POST["username"];
	$pass = $_POST["password"];

	// Check for error in connection
	if ($conn->connect_error)
	{
		// Handle connection error
		echo $conn->connect_error . "fail whale";
	}

	// Connection successful, verify login details
	else
	{
		$loginQuery = "SELECT UserID, userPWHash FROM user WHERE username='" . $user . "'";

		// Query database to retrieve the userID of an attempted login. This query
		// will return false if the log in credentials don't match a user's data
		$loginAttempt = $conn->query($loginQuery);

		$loginFlag = false;
		if ($loginAttempt->num_rows > 0)
		{
			$loginAttempt = $loginAttempt->fetch_assoc();
			$retrievedHash = $loginAttempt["userPWHash"];
			$userID = $loginAttempt["UserID"];

			if(password_verify($pass, $retrievedHash))
			{
				$_SESSION["UserID"] = $userID;
				$loginFlag = true;
				header("Location: /dashboard.php");
			}

		}

		// If the query failed, the log in information was invalid
		if(!$loginFlag)
		{
			// Check if the user exists in the database meaning invalid password
			$usernameCheckQuery = "SELECT UserID FROM user WHERE username = '" . $user . "'";

			$usernameCheckQueryResult = $conn->query($usernameCheckQuery);
			// If the username is not present in the database, direct to sign up
			if($usernameCheckQueryResult->num_rows == 0)
			{
				// Placeholder for redirecting to signup page
				header("Location: /?default=login&username=".$user."&error=Invalid username.");
				$conn->close();
				die();
			}

			// If the username IS present, the login attempt had an invalid password
			else
			{
				header("Location: /?default=login&username=".$user."&error=Incorrect password.");
				$conn->close();
				die();
			}
		}
	}
?>
