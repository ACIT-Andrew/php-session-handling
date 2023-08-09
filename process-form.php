<?php
require_once('config.php');

session_start();

// DECLARE CONSTANTS & VARIABLES //

// Store errors
$errors = array();
// Store username information
$username = "";
$password = "";


// INPUT VALIDATION //

if (
  isset($_POST['username']) &&
  isset($_POST['password'])
) {

  // Form fields exist
  $username = trim($_POST['username']);
  $password = $_POST['password'];

  // Ensure username was filled in
  if (empty($username)) {
    $errors[] = "Username cannot be empty";
  } elseif (!in_array($username, REGISTERED_USERS, true)) {
    $errors[] = "The username $username is not one of our registered users.";
  }

  //ensure password was correct	
  if ($password == SECRET_PASSWORD) {
    //if password field data is OK,
    echo "<p>password accepted</p>";
    //else, the password is incorrect	
  } else {
    $errors[] = "Password NOT accepted (next time, try 'bcit')";
  }

} else {
  // Form fields don't exist
  $errors[] = "Please fill in the form";
}


// ERROR CHECKING //

if (count($errors) > 0) {
  // Transfer errors to Session 'error-messages'
  $_SESSION['error-messages'] = $errors;
  // Bring user back to login page
  header("location: index.php");
  die();
} else {
  // No errors. Proceed to create session data for user
  // Saving any important info for later
  $_SESSION['username'] = $username;
  $_SESSION['timeLoggedIn'] = time();
  $_SESSION['timeLastActive'] = time();

  // Forward user to one of the content pages
  header("location: gears.php");
  die();
}


?>