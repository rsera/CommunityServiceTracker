<?php
	// Handle new user signup input, insert into database, save hashed password
    include "header.php";

	// Store username and password from form submission
	$FName =  mysqli_real_escape_string($conn, $_POST['FName']);
	$LName = mysqli_real_escape_string($conn, $_POST['LName']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
	$goal = mysqli_real_escape_string($conn, $_POST['goal']);
    $pass = mysqli_real_escape_string($conn, $_POST['PWHash']);
    $pass2 = mysqli_real_escape_string($conn, $_POST['PWHash2']);

	// Check if passwords are equal
	// If wrong,  redirect back to home
	if($pass != $pass2)
	{
		header("Location: /?default=signup&fname=".$FName."&lname=".$LName."&username=".$username."&goal=".$goal."&error=Passwords don't match.");
		die();
	}

	// Check for error in connection
	if ($conn->connect_error)
	{
		// Handle connection error
		echo $conn->connect_error . "fail whale";
	}

	// Connection successful

	// Check if account already exists for this user.
	// If so, redirect back to sign in page
	$sql = "SELECT username FROM user WHERE username = '". $username . "'";
	$usernameCheck = mysqli_query($conn, $sql);

	if (mysqli_num_rows($usernameCheck) > 0)
	{
		// Invalid - Username exists in table already, go to Login
		header("Location: /?default=signup&fname=".$FName."&lname=".$LName."&username=".$username."&goal=".$goal."&error=Username already exists.");
		die();
	}


	// Valid username, insert new user
	else
	{
		// Make hashed version of password using bcrypt
		$hashedPass = password_hash($pass, PASSWORD_DEFAULT);

		// Make sql query string
		$sql = "INSERT INTO user(FName, LName, goal, username, userPWHash)
					VALUES('" . $FName . "','". $LName . "','" . $goal . "','" . $username . "','" . $hashedPass . "')";

		if (!$conn->query($sql) == TRUE)
		{
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}

		// Obtain UserID of newly created user
		$userIDQuery = "SELECT UserID, userPWHash FROM user WHERE username='" . $username . "'";

		$userIDResult = $conn->query($userIDQuery);
		$validID = $userIDResult->fetch_assoc();
		$userID = $validID["UserID"];
		$retrievedHash = $validID["userPWHash"];

		if(password_verify($pass, $retrievedHash))
			$_SESSION["UserID"] = $userID;
		header("Location: /dashboard.php");
		$conn->close();
		die();
	}
?>
