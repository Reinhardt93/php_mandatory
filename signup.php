<?php
require_once ('dbhandler.php');
if ($_SERVER["REQUEST_METHOD"] == "POST")
$firstName  = && !empty($_POST['first-name'];)
$lastName   = && !empty($_POST['last-name'];)
$userName   = && !empty($_POST['user-name'];)
$email      = && !empty($_POST['email'];)
$password   = && !empty($_POST['password'];)
{


//Todo: sanitize the post data
//Check if the form is posted and the form values are not empty, then run the code.
//if($_SERVER["REQUEST_METHOD"] == "POST") {

$q = "INSERT INTO users (first_name, last_name, username, email, password)
  Values('$firstName', '$lastName', '$userName', '$email', '$password')";

$result = mysqli_query($dbc, $q);

if (mysqli_affected_rows($dbc) == 1) {
  //echo "You are created in the system";
  $_SESSION['signup-message'] = "You account has been created succesfully!";
} else {
  //echo mysqli_error($dbc);
    $_SESSION['signup-message'] = mysqli_error($dbc);
}
}
}
header ("Location: index.php");

?>
