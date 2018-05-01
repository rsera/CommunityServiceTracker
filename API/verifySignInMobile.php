<?php
	include "header.php";

	// Store username and password from form submission
	$json = file_get_contents('php://input');
	$obj = json_decode($json, TRUE);

	// Retrive data from decoded JSON object
	$user = mysqli_real_escape_string($conn, $obj['username']);
	$pass = mysqli_real_escape_string($conn, $obj['password']);


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
		$query = "SELECT UserID, userPWHash FROM user WHERE username = '$user' ";

		// Query database to retrieve the userID of an attempted login. This query
		// will return false if the log in credentials don't match a user's data

		// This query will check to see if the user exists in the database
		$loginAttempt = mysqli_query($conn, $query);

		$loginFlag = false;

		if ($loginAttempt->num_rows <= 0)
			echo "Failure";


		// A successful SELECT query will have a row for each selected data
		if ($loginAttempt->num_rows > 0)
		{
			$loginAttempt = $loginAttempt->fetch_assoc();
			$retrievedHash = $loginAttempt["userPWHash"];
			$userID = $loginAttempt["UserID"];

			// Verify that the passwords match the database
			if(password_verify($pass, $retrievedHash))
			{
				// Update sessions table
				$sql = "INSERT INTO sessions(userID, sessionID) VALUES('".$userID."', UUID())";

				// If the INSERT query returns true it was successful
				if ($result = $conn->query($sql) == TRUE)
			    {
					$sql = "SELECT sessionID FROM sessions WHERE userID = '".$userID."' ORDER BY lastActivity DESC LIMIT 1";
					$result = $conn->query($sql);
					if ($result->num_rows > 0)
					{
						$result = $result->fetch_assoc();
						setcookie("vtrakSession", $result["sessionID"], time() + (86400 * 30), "/"); // (86400 * 30) is to expire after 30 days -- can modify if desired
						setcookie("vtrakUser", $userID, time() + (86400 * 30), "/"); // (86400 * 30) is to expire after 30 days -- can modify if desired
						$_SESSION["UserID"] = $userID;
						$loginFlag = true;
						echo("Logged In");
					}
			    }
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
				$conn->close();
				die();
			}

			// If the username IS present, the login attempt had an invalid password
			else
			{
				$conn->close();
				die();
			}
		}
	}
?>
