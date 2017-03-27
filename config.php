<?php
ini_set( "display_errors", true );
define( "DB_DSN", "mysql:host=localhost;dbname=php-assignment" );
define( "DB_USERNAME", "username" );
define( "DB_PASSWORD", "password" );
define( "CLASS_PATH", "model" );
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_PRODUCTS", 5 );
define( "ADMIN_USERNAME", "admin" );
define( "ADMIN_PASSWORD", "mypass" );
require( CLASS_PATH . "/products.php" );

function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  error_log( $exception->getMessage() );
}

set_exception_handler( 'handleException' );
?>
