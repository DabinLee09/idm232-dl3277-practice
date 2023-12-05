<?php 

consoleMsg("env.php file loaded");

$domain = $_SERVER['HTTP_HOST'];
consoleMsg("Domain is : $domain");

// specific to the current environment you're on.

if($domain =='localhost:8888'){

    $APP_CONFIG = [
        'environment' => 'local',
        'site_url' => 'http://localhost:8888/',
        'database_host' => 'localhost',
        'database_user' => 'root',
        'database_pass' => 'root',
        'database_name' => 'idm232',
    ];
}else{
    $APP_CONFIG = [
        'environment' => 'live',
        'site_url' => 'https://www.dabinl.com/',
        'database_host' => 'mysql.dabinl.com',
        'database_user' => 'dabincooksy',
        'database_pass' => '1q2w3e!!',
        'database_name' => 'idm232_cooksy_beta',
    ];

}


?>

