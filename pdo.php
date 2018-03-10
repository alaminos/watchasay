<?php

require_once('config.php');
$statement = "'mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT . "', '" . DB_USER . "','" . DB_PASS . "'";
$pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=blablapp;port=' . DB_PORT, DB_USER, DB_PASS);
//See the "errors" folder for details.
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
