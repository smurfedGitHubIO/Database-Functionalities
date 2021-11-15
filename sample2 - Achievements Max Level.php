<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	$database_connection = mysqli_connect("localhost","root","");
	mysqli_select_db($database_connection, "LEMONS");
	$file = fopen("username.txt","r");
	$username = fgets($file);
	fclose($file);
	$levels = "";
	$second_game_max_level = -1, $third_game_max_level = -1;
	$query = mysqli_query($database_connection, "SELECT * FROM `second-game-stats` WHERE username='$username'");
	while($line = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		if($second_game_max_level < $line['level'])
			$second_game_max_level = $line['level'];
	}
	$levels .= $second_game_max_level.",";
	$query = mysqli_query($database_connection, "SELECT * FROM `third-game-stats` WHERE username='$username'");
	while($line = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		if($third_game_max_level < $line['level'])
			$third_game_max_level = $line['level'];
	}
	$levels .= $third_game_max_level;
	$file = fopen("levels.txt", "w");
	fwrite($file, $levels);
	fclose($file);
	mysqli_close($database_connection);
	 ?>
</body>
</html>