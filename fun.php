<?php

consoleMsg("fun php loaded");


// DEFINE ALL GLOBAL VARS HERE

global $APP_CONFIG;

function consoleMsg ($msg){
    echo '<script type="text/javascript">console.log("'.$msg.'");</script>';
}

function echoSearchValue() {
    if(isset($_POST['search'])) { 
      echo $_POST['search'];
    } 
  }

function echoServingValue() {
    if(isset($_POST['serving'])) { 
      echo $_POST['serving'];
    } 
  }

?>