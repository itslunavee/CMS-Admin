<?php

include_once( 'database.php' );
error_reporting(E_ALL);
ini_set('display_errors', 1);

//all user information is collected using the global variable "Server" https://www.php.net/manual/en/reserved.variables.server.php
        
//The IP address of the current user
$user_ip_address = $_SERVER['REMOTE_ADDR'];

//find current date
$current_date = date("Y-m-d H:i:s");  


//Logs visitor data to SQL database https://www.codexworld.com/store-visitor-log-in-the-database-with-php-mysql/
$sql = "INSERT INTO visitor_logs (user_ip_address, created) VALUE('$user_ip_address', '$current_date')"; 

?>