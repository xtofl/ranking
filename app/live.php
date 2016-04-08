<?php 
$round = $_GET["round"];
$base = $_GET["base"];
$category = $_GET["category"];
?>
<html>
	<head>
<!-- Support libraries from Yahoo YUI project -->  
<script type="text/javascript"  
    src="http://chesstempo.com/js/pgnyui.js">  
</script>   
<script type="text/javascript"  
    src="http://chesstempo.com/js/pgnviewer.js">  
</script>  
<link  
 type="text/css"   
 rel="stylesheet"   
 href="http://chesstempo.com/css/board-min.css">  
</link>  
<script>  
var viewer = new PgnViewer(  
  { boardName: "demo",  
    //pgnFile: 'http://www.bjk2016.be/games/14B/games.pgn',  
    pgnString: "",
    pieceSet: 'leipzig',   
    pieceSize: 46  
  }  
);  

var loadPgn = function(category) {
  if (!category) return;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
	    console.log('pgn was read');
	    viewer.setupFromPgn(xhttp.responseText);
    }
  };
  var url = <?php
print("\"/app/pgn.php?category=".$category."&base=$base&round=$round\""); ?>;
  xhttp.open("GET", url, true);
  xhttp.send();
};
var selectedValue = function(){
  var cat = "<?php print($_GET["category"]); ?>";
  return cat;
};
var reloadPgn = function() {
	loadPgn(selectedValue());
};
</script>  
</head>
<body onload="reloadPgn()">
	<button onclick="reloadPgn()">reload pgn</button>
	(thanks to chesstempo pgn viewer)
<div id="demo-container"></div>  
<div id="demo-moves"></div>  
</body>
</html>
