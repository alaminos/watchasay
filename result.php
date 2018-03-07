<?php
session_start();
require 'pdo.php';

/****
 * if $user is not empty, 
 * 
 
$sql = $pdo->query( "SELECT last_seen
FROM user_phrases
WHERE userid = :userid AND phraseid = :phraseid" )

$stmt = $sql->prepare()
if ( !$stmt->execute() ) {

}

si sí, la cambia

$sql = $pdo->query(
    "UPDATE user_phrases
    SET last_seen = :datetime
    WHERE userid = :userid AND phraseid = :phraseid
    "
)

peut et ça peut aider: https://www.sitepoint.com/community/t/update-an-empty-row/43480/3 

//si ça marche pas:

INSERT INTO user_phrases (userid, phraseid, last_review, ...)
VALUES (:userid, :phrase, :date, ...); 

    si no, la introduce con un fallow correspondiente; */
/** $sql insert into user_frases (user, phrase_id, fallow, datetime)
*    values (:user, :phrase, :fallow, :datetime)
*   // user será tomado de $_SESSION 
*  // frase será enviada por JS, calculado aquí
*   $result == 1 ? $fallow 
*
*/

//UPDATE `user_phrases` SET `fallow` = 'http://www.itworks.com' WHERE `user_phrases`.`id` = 3 

//if not found, create it

//$result = $_POST['result'];

/*$sql = "INSERT INTO frases (text) VALUES (:result)";

$stmt = $pdo->prepare($sql);

$stmt->bindParam(":result", $_POST['result']);

if( $stmt->execute() ):
    $message = "Succesfully sent to server";
else:
    $message = 'Oh, something went wrong';
endif;

echo $message;*/

$date = date('Y-m-d h:i:s'); //capital M and D would give February Tuesday, instead of 02-02


$phrase = $_POST["phrase_id"];
$result = $_POST["result"];

$userid = $_SESSION["user_id"];
 // $date = current datetime

 // $sql = insert into junction table userid_phrase_id values tadada tididi
 

echo "hi, The user ID is " . $userid . ".
 The phrase ID is:" . $phrase . ".
  The result is: " . $result . " 
  and the date is: " . $date;