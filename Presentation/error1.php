<?php

/* What is an error handler? Well the error handler does stuff if a specific error happens.
Let's say that you are running your normal code and are expected to take path A, but it is unfortunetaly blocked
so you are forced to do something. With an error handler you can now decide to take path B instead */

// There are different error levels - google it
$file = fopen("sample.txt", "r");

?>
