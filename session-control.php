<?php
session_start();
require_once('config.php');

// LOGIN STATUS //
if (!isset($_SESSION['username'])) {
    $_SESSION['error-messages'] = array("Please log in to view content.");
    header('location: logout.php');
    die();
}else{
    echo"<p>Hello, <b>". $_SESSION['username'] . "</b>! Welcome to the PHP store. </p>";
}

// TIMEOUT CHECKING //

if (isset($_SESSION['timeLastActive'])) {

    // Determine time now
    $timeNow = time();
    // Set time of last active to current time
    $timeLastActive = $_SESSION['timeLastActive'];
    // Calculate the difference
    $timeSinceLastRequest = $timeNow - $timeLastActive;
    // $timeLastActive += $timeSinceLastRequest;

    // See if timeout has exceeded
    if ($timeSinceLastRequest > TIMEOUT_IN_SECONDS) {
        // Timeout has been exceeded
        //prepare error message
        $_SESSION['error-messages'] = array("You have been logged out due to inactivity.</p>");
        //forward user to logout page
        header("location: logout.php");
        //terminate this script
        die();
    } else {
        // If timeout has not been exceeded, refresh time of last active to current time
        $_SESSION['timeLastActive'] = $timeNow;
    }
}
?>