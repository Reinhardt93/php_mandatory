<?php
$dbc = mysqli_connect('localhost', 'root', '', 'php-assignment');
if (!$dbc) {
  echo "Error: unable to connect to database" . PHP_EOL;
  echo "Debugging Error: " . mysqli.connect_error() . PHP_EOL;
  exit;
}
?>
