<?php
$dbc = mysqli_connect('localhost', 'root', '', 'php-assignment');
if ($dbc->connect_error) {
    die('Connect Error: ' . $dbc->connect_error);
}
