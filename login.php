<?php
session_start();
require_once('dbhandler.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") /*&& !empty($_POST['user-name']) && !empty($_POST)['password']*/ {

$userName   = $_POST['user-name'];
$password   = $_POST['password'];

//Todo: sanitize the post data - USE PDO!
$q = "SELECT * FROM users WHERE username = '$userName' AND password = '$password'";

$result = mysqli_query($dbc, $q);

if (!$row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    $_SESSION['login-message'] = "Your username or password is incorrect";
} else {
    //unset($_SESSION)
    $_SESSION['login-message'] = "You have logged in as";
}
}
header("location: index.php");
?>
