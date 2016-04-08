<?php
function boards() {
	return array(
	"12B" => "12B",
	"12G" => "12G",
	"14B" => "14B",
	"14G" => "14G",
	"16" => "16",
	"18" => "18",
	"20" => "20"
);
}
function live_url($category) {
	return "/app/live.php?category=$category";
};

function pgn_url($category) {
	return "/app/pgn.php?category=$id";
};


function print_navbar_items() {
	print('<ul>');
	foreach(boards() as $id => $board) {
		$url = live_url($id);
		print("<li><a href='$url'>$board</a></li>\n");
	}
	print('</ul>');
}
?>
