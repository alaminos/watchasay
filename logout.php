<?php

session_start();

$_SESSION = array(); 
//"only affects the local $_SESSION variable instance but not eh session data in the session storage" (?)
//for that we need:
session_destroy();

header("Location: index.php");
exit;