<?php

$getSentencesQuery = $pdo->query("SELECT * FROM frases");

$sentencesArray = [];

while ( $row = $getSentencesQuery->fetch(PDO::FETCH_ASSOC) ) {
    $sentencesArray[] = $row;
}

/*
echo "<pre>";
print_r($sentencesArray);
echo "</pre>";
*/
return $sentencesArray;

/*

recuperar datos de bd a petición:

$query = $pdo->prepare("SELECT * FROM people WHERE nom=?");

$query->execute(array($nom));

while($row = $query->fetch()) {
    echo $row['nom'] . ' habite à ' . $row['ville'];
}*/