
<?php
$pdo = new PDO('mysql:host=127.0.0.1;dbname=blablapp;port=3306', 'root', '');
//See the "errors" folder for details.
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>