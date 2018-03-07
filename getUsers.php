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