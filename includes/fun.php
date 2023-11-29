<?php

consoleMsg("fun php loaded");


// DEFINE ALL GLOBAL VARS HERE

$GLOBALS = $APP_CONFIG;


function consoleMsg ($msg){
    echo '<script type="text/javascript">console.log("'.$msg.'");</script>';
}

?>