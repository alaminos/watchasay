<?php
//session_start();

if( isset($_SESSION['user_id']) ) {
        $records = $pdo->prepare('SELECT user_id,username,email,password FROM users WHERE user_id = :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $user = NULL;

        if ( count($results) > 0) {
            $user = $results;
        }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<!-- *** *** *** *** *** HEAD *** *** *** *** *** -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Watchasay</title>
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
        
        
        <h1>WATCHASAY</h1>
        <h2>The oral comprehension game</h2>
<!-- *** *** *** *** *** GAME AREA *** *** *** *** *** -->
        <div id="gameArea">
            <div id="btnArea">
                <button class="btn" id="btnHP" type="button" title="play" onclick="model.player()">
                    <audio id="player">
                        <source id="source" src="audio/inter1.ogg" type="audio/ogg">
                    </audio>
                </button>
                <button class="btn" id="btnOK" type="button" onclick="model.verify();" title="verify"></button>
                <button class="btn" id="btnNext" type="button" title="next phrase" onclick="handlers.fetchNextSentence()"></button> <!--take next sentence from JSON object-->
            </div>

            <div id="userInputBox"></div>

            <div id="tokensBox"></div>

            <div id="msgBox"></div>
        </div>
    </main>
<!-- *** *** *** *** *** FOOTER *** *** *** *** *** -->
    <footer>
        <nav>
            <ul>
                <li><a class="link_btn" href="getUsers.php">Get users</a></li>
                <li><a class="link_btn" href="newSentence.php">Add sentence</a></li>
                <li><a class="link_btn" href="meta.html">Meta</a></li>
            </ul>
        </nav>
    </footer>
    
    
</body>
</html>