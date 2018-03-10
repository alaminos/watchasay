<?php
session_start();

if (isset($_SESSION['user_id']) ){
    header("Location: index.php");
}
require 'pdo.php';

$message = '';


if (!empty($_POST['email']) && !empty($_POST['password'])):
    $sql = "INSERT INTO users (username, email, password) VALUES (:username, :email, :password)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
    //using bindValue() because bindParam() was producing error "only variables can be passed by reference"
    //however, as I later found out, bindParam() was registering the user inspite of the error thrown

    if($stmt->execute() ):
        $message = 'Successfully created new user.';
    else:
        $message = 'Oh, something went wrong.';
    endif;
endif;

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>New user</title>
</head>
<body>
    <nav>
        <?php
            /*previous verion -- left for the record
            
            if ( 
                isset($_POST['name']) && 
                isset($_POST['email']) && 
                isset($_POST['password'])
                ) {
                    $sql = "INSERT INTO users (username, email, password) 
                            VALUES (:name, :email, :password)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute(array(
                        ':name' => $_POST['name'],
                        ':email' => $_POST['email'],
                        ':password' => $_POST['password']
                    ));
                } */
        ?>
        <ul id="navbar">
            <li><a class="link_btn" href="index.php">Watchasay</a></li>
            <li><a class="link_btn" href="login.php">or login here</a></li>
        </ul>
    </nav>
    <main>
        <h1>New user</h1>
        <form method="POST" action="signup.php"> 
            <input type="text" name="username" placeholder="your username">
            <input type="text" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <button type="submit">Register</button>
        </form>

        <div> <?php if ($message) { echo $message; } ?> </div>
    </main> 
</body>
</html>