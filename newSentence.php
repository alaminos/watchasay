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
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>New sentence</title>
</head>
<body>

    <nav> <!-- *** *** ***  NAV BAR  *** *** *** -->
        <ul id="navbar">
        
            <?php if ( !empty($user) ) : ?>
                <li><a class="link_btn" href="#">Welcome <span id="navbar-user-name-"><?= $user['username']; ?></span> !</a></li>
                <li><a class="link_btn" href="logout.php">Logout</a></li>    
            <?php else : ?>
                
                    <li><a class="link_btn" href="login.php">Log in</a></li>
                    <li><a class="link_btn" href="signup.php">Sign up</a></li>
            <?php endif; ?>
            <li class="divider"></li>
            <li><a class="link_btn" href="#">Language : <!--[insert php here]--></a></li>
        </ul>
        
    </nav>
    <main>
        
        <h1>WATCHASAY add a sentence</h1>
        <h2>Currently admin only</h2>
        <div class="main_divider"></div>
        <form class="usr_input" action="" method="post">
            <label for="textarea">Add new sentence: </label><br />
            <textarea name="text" cols="30" rows="4" placeholder="type your sentence"></textarea>
            <br /><label for="audiourl">Audio URL</label><br />
            <input type="text" name="audiourl" placeholder="URL of audio file">
            <br /><label for="record_year">Year of recording</label><br />
            <input type="number" name="record_year" min="1900" max="3000"><br />
            <button type="submit">Sumit</button>
        </form>
    </main>
<!-- *** *** *** *** *** FOOTER *** *** *** *** *** -->
    <footer>
        <nav>
            <ul>
                <li><a class="link_btn" href="getUsers.php">Get users</a></li>
                <li><a class="link_btn" href="newSentence.php">Add sentence</a></li>
                <li><a class="link_btn" href="meta.html">Meta</a></li>
                <li class="divider"></li>
                <li><a class="link_btn" href="#">Highscores</a>
            </ul>
        </nav>
    </footer>
</body>
</html>