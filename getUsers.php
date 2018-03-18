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

<!-- *** *** ***  NAV BAR  *** *** *** -->
    <nav>
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
        <h1>WATCHASAY users</h1>
        <h2>Admins only</h2>
<!-- *** *** *** *** *** TABLE AREA *** *** *** *** *** -->
	<?php

		require_once('pdo.php');

		$stmt = $pdo->query("SELECT * FROM users");
		echo '<table border="1">'. "\n";
		while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
		    echo "<tr><td>";
		    echo( $row['username'] );
		    echo "</td><td>";
		    echo( $row['email'] );
		    echo "</td></tr>\n";
		}
		echo "</table>\n";
		/*
		<table border="1">
		<tr><td>Johnny</td><td>johnny86@wahoo.com</td><td>123</td></tr>
		...
		</table>*/
	?>
    </main>
<!-- *** *** *** *** *** FOOTER *** *** *** *** *** -->
    <footer>
        <nav>
            <ul>
                <li><a class="link_btn" href="index.view.php">Watchasay</a></li>
                <li><a class="link_btn" href="newSentence.php">Add sentence</a></li>
                <li><a class="link_btn" href="meta.html">Meta</a></li>
                <li class="divider"></li>
                <li><a class="link_btn" href="#">Highscores</a>
            </ul>
        </nav>
    </footer>
    
    
</body>
</html>