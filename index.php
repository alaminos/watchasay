<?php
    session_start();
    require 'pdo.php';
    require("index.view.php");
    require("scripts/getSentenceDeck.php");
    //require 'result.php';
?>
    <script type="text/javascript">
    var data = <?php echo json_encode($sentencesArray); ?>;
    console.log(data);
    </script>
    <script src="client.js"></script>