<?php 

consoleMsg("database.php file loaded");

//step 1: create database conection
$db_host = $APP_CONFIG['database_host'];
$db_user = $APP_CONFIG['database_user'];
$db_pass = $APP_CONFIG['database_pass'];
$db_name = $APP_CONFIG['database_name'];
$db_conection = @new mysqli($db_host, $db_user, $db_pass, $db_name);

// //check the connection to make sure it is good
// if(@$db_conection->connect_error){
//     echo 'Errno: '.$mysqli->connect_errno;
//     echo '<br>';
//     echo 'Error: '.$mysqli->connect_error;
//     exit();
// }
// 

consoleMsg("success: A gproper conection to MYSQL was made");
consoleMsg("Host information: $db_conection->host_info ");
consoleMsg("Host information: $db_conection->protocol_version ")

//$db_host
?>

