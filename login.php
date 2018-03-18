<?php
session_start();

if ( isset($_SESSION['user_id']) ) {
    header('Location: index.php');
}

require 'pdo.php';

if (!empty($_POST['email']) && !empty($_POST['password'])):

    $records = $pdo->prepare('SELECT user_id,email,password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){
        $_SESSION['user_id'] = $results['user_id'];
        header('Location: index.php');
    } else {
        $message = 'Sorry, those credentials do not match';
    }
endif;
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
                <li><a class="link_btn" href="logout.php">How did you get here ?</a></li>
            <?php else : ?>
                
                    <li><a class="link_btn" href="index.view.php">Watchasay</a></li>
                    <li><a class="link_btn" href="signup.php">Sign up</a></li>
            <?php endif; ?>
            <li class="divider"></li>
            <li><a class="link_btn" href="#">Language : <!--[insert php here]--></a></li>
        </ul>
        
    </nav>
    <main>
        <p>

        <?php  if (!empty($message)) { echo $message; }   ?>
        
        </p>

        <h1>WATCHASAY Login</h1>
        <h2>Eventually <a href="signup.php">sign up here</a>.</h2>
        <div class="main_divider"></div>
        <form class="usr_input" action="login.php" method="POST">
            <label>Your email address:</label><br />
            <input type="text" name="email" id="" placeholder="Your email">
            <br /><label>Your password:</label><br />
            <input type="password" name="password" placeholder="your password">
            <br />
            <button type="submit">Login</button>
        </form>
    </main>
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