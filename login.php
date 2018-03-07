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
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>
<body>
    
    <header>Bla-blapp</header>
    
    <p>

    <?php  if (!empty($message)) { echo $message; }   ?>
    
    </p>

    <h1>Login</h1>
    <span>or <a href="signup.php">Sign up here.</a></span>

    <form action="login.php" method="POST">
        <input type="text" name="email" id="" placeholder="Your email">
        <input type="password" name="password" placeholder="your password">
        <button type="submit">Go</button>
    </form>

</body>
</html>