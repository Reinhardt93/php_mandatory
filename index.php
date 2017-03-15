<?php
session_start();
?>
<html>
<head>
  <title>PHP</title>

</head>
<body>
  <form action="login.php" method="post">
    <fieldset>
      <legend>Login Up</legend>
      <input type="text" name="user-name" placeholder="User Name">
      <input type="password" name="password" placeholder="password">
      <button type="submit">Login</button>
    </fieldset>
  </form>

  <?php
  /*
    if isset($_SESSION) {
    echo $_SESSION['login-message'];
  }
  */
  ?>

  <form action="signup.php" method="post">
    <fieldset>
      <legend>Sign Up</legend>
      <input type="text" name="first-name" placeholder="First Name">
      <input type="text" name="last-name" placeholder="Last Name">
      <input type="text" name="user-name" placeholder="User Name">
      <input type="text" name="email" placehodler="Email">
      <input type="password" name="password" placeholder="password">
      <button type="submit">Sign Up</button>
    </fieldset>
  </form>
  <form action="logout.php" method="post">
    <button type="submit">Logout</button>
  </form>
</body>
</html>
