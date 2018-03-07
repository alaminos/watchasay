<?php

require_once('pdo.php');

if (
    isset( $_POST['text'] ) &&
    isset( $_POST['audiourl'] )
    ) 
    {
    $sql = "INSERT INTO frases (text, source, recdate)
            VALUES (:text, :audiourl, :record_year)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(array(
        ':text' => $_POST['text'],
        ':audiourl' => $_POST['audiourl'],
        ':record_year' => intval( $_POST['record_year'] )
    ));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New sentence</title>
</head>
<body>


<form action="" method="post">
    <label for="textarea">Add new sentence*</label>
    <textarea name="text" placeholder="type your sentence"></textarea>
    <label for="audiourl">Audio URL</label>
    <input type="text" name="audiourl" placeholder="URL of audio file">
    <label for="record_year">Year of recording</label>
    <input type="number" name="record_year" max="3000">

    <button type="submit">Sumit</button>
</form>

    
</body>
</html>