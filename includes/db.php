<?php

$con = mysqli_connect("localhost","root","root","ecommerce");

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $host     = 'localhost';
  $db       = 'ecommerce';
  $user     = 'root';
  $password = 'root';

  $dsn = "mysql:host=$host;dbname=$db";

  $opt = [
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES      => false,
  ];

  $pdo = new PDO($dsn, $user, $password, $opt);
?>
