<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript">
		var xmlhttp = new XMLHttpRequest();
		var first_game = {};
		var second_game = {};
		var third_game = {};
		function evaluate(){
			xmlhttp.open("firstGameHistory.txt","r",true);
			xmlhttp.onreadystatechange = handleReadyStateChange;
			xmlhttp.send(null);
		}
		function handleReadyStateChange(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				var textVal = xmlhttp.responseText;
				while(textVal.length)
			}
		}
		/**
		 * Yung daily attendance makukuha na sa database.
		 * Yung huling tatlo pwede naman sa PHP na mismo tas para mabawasan na
		 * yung mga files na kailangan.
		**/
	</script>
</head>
<body>
	<?php 
	$database_connection = mysqli_connect("localhost", "root", "");
	mysqli_select_db($databse_connection, "LEMONS");
	$file = fopen("username.txt","r");
	$line = fgets($file);
	fclose($file);
	$firstGameHistory = "";
	$firstGameQuery = mysqli_query($database_connection, "SELECT * FROM `first-game-stats` WHERE username='$username'");
	while($line = mysqli_fetch_array($firstGameQuery, MYSQLI_ASSOC)){
		$firstGameHistory = $firstGameHistory.$line["date"].",".$line["level"].','.$line["emotion"].",".$line["score"].'\n';
	}
	$file = fopen("firstGameHistory.txt","w");
	fwrite($file,$firstGameHistory);
	fclose($file);
	$secondGameHistory = "";
	$secondGameQuery = mysqli_query($database_connection, "SELECT * FROM `second-game-stats` WHERE username='$username'");
	while($line = mysqli_fetch_array($secondGameQuery, MYSQLI_ASSOC)){
		$secondGameHistory = $secondGameHistory.$line["date"].",".$line["level"].','.$line["time"].",".$line["moves"].'\n';
	}
	$file = fopen("secondGameHistory.txt","w");
	fwrite($file,$secondGameHistory);
	fclose($file);
	$thirdGameHistory = "";
	$thirdGameQuery = mysqli_query($database_connection, "SELECT * FROM `third-game-stats` WHERE username='$username'");
	while($line = mysqli_fetch_array($thirdGameQuery, MYSQLI_ASSOC)){
		$thirdGameHistory = $thirdGameHistory.$line["date"].",".$line["level"].','.$line["time"].'\n';
	}
	$file = fopen("thirdGameHistory.txt","w");
	fwrite($file,$thirdGameHistory);
	fclose($file);
	echo("<script>evaluate();</script>");
	mysqli_close($database_connection);
	 ?>
</body>
</html>
