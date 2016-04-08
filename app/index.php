<html>
	<head>
		<title>Bjk Live Boards hack</title>
		<link rel="stylesheet" href="ranking.css">
	</head>
	<body>
<h1>Live boards Bjk 2016</h1>
(thanks to Ruben's open urls)
<ul>
<?php
$boards = array(
	"12B" => "12B",
	"12G" => "12G",
	"14B" => "14B",
	"14G" => "14G",
	"16" => "16",
	"18" => "18",
	"20" => "20"
);
foreach($boards as $id => $board) {
	$url = "/app/live.php?category=$id";
	print("<li><a href='$url'>$board</a></li>\n");
}
?>
</ul>
	</body>
</html>
