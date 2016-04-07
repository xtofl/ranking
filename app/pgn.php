<?php
$category = $_GET["category"];
$content = file_get_contents("http://www.bjk2016.be/games/${category}/games.pgn");
header('Content-Type:text/plain');
print($content);
?>

