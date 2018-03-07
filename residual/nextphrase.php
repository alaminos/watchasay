<?php
session_start();
require 'pdo.php';


$stmt = $pdo->query("SELECT * FROM frases  /*room for improvement*/
                    ORDER BY RAND(),
                    LIMIT 1");

$frase = $stmt->fetch(PDO::FETCH_ASSOC);
   
echo $frase;
//