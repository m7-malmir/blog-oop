<?php
require 'constants.php';
$mysqli = new mysqli("localhost","egator","mamad1234","egator");

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit(); 
}
?>