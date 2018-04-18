<?php
// we need session start to apply to all php pages so the session is maintained
session_start();
// creates db connection only the first time header is included
require_once "dbinit.php";

// utililty functions
function checkSession(){
	global $conn;
	if (isset($_COOKIE['vtrakUser']) && isset($_COOKIE["vtrakSession"])){
		$sql = "SELECT 1 FROM sessions WHERE userID='".mysqli_real_escape_string($conn, $_COOKIE['vtrakUser'])."' AND sessionID = '".mysqli_real_escape_string($conn, $_COOKIE['vtrakSession'])."'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0)
		{
			$sql = "UPDATE sessions SET lastActivity=NOW() WHERE userID='".mysqli_real_escape_string($conn, $_COOKIE['vtrakUser'])."' AND sessionID = '".mysqli_real_escape_string($conn, $_COOKIE['vtrakSession'])."'";
			$result = mysqli_query($conn, $sql);
			return true;
		}
	}
	return false;
}

function sanitizeXSS($str){
	$str = str_replace("<", "&lt;", $str);
	$str = str_replace(">", "&gt;", $str);
	$str = str_replace("'", "&apos;", $str);
	$str = str_replace('"', "&quot;", $str);
	return $str;
}
?>
