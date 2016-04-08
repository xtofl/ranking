<?php
$category = $_GET["category"];
$round = $_GET["round"];
$base = $_GET["base"];

if (!$round) $round = "games";
if (!$base) $base = "games";

if ($base == "games_web"){
	$category=array
	(
	"8B" => "B8",
	"8G" => "G8",
	"10B" => "B10",
	"10G" => "G10",
	"14B" => "B14",
	"14G" => "G14",
	"16" => "16",
	"18" => "18",
	"20" => "20"
	)[$category];
}
$content = file_get_contents("http://www.bjk2016.be/$base/$category/$round.pgn");
header('Content-Type:text/plain');
print($content);
?>

