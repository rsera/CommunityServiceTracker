// End session, reset UserID variable, send user back to main page

<?php
    session_start();

    $thisUserID = $_SESSION['UserID'];
    $sql = "DELETE FROM sessions where userID = ".$thisUserID;
    $result = mysqli_query($conn, $sql);
    unset($_SESSION["UserID"]);
    header("Location: index.php");
    die();
?>
