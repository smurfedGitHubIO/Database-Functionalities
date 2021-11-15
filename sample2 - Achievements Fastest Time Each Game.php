<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<?php 
	$database_connection = mysqli_connect("localhost","root","");
	mysqli_select_db($database_connection,"LEMONS");
	$file = fopen("username.txt", "r");
	$username = fgets($file);
	fclose($file);
	$query = mysqli_query($database_connection, "SELECT * FROM `first-game-stats` WHERE username='$username'");
	$fastest_time_first_game = 10000000;
	while($line = mysqli_fetch_array($query, MYSQLI_ASSOC)){
		if($line['time'] < $fastest_time_first_game)
			$fastest_time_first_game = $line['time'];
	}
	$query = mysqli_query($database_connection, "SELECT * FROM `second-game-stats` WHERE username='$username'");
	$fastest_time_second_game = 10000000;
	while($line = mysqli_fetch_array($query, MYSQLI_ASSOC)){
		if($line['time'] < $fastest_time_second_game)
			$fastest_time_second_game = $line['time'];
	}
	$query = mysqli_query($database_connection, "SELECT * FROM `third-game-stats` WHERE username='$username'");
	$fastest_time_third_game = 10000000;
	while($line = mysqli_fetch_array($query, MYSQLI_ASSOC)){
		if($line['time'] < $fastest_time_third_game)
			$fastest_time_third_game = $line['time'];
	}
	//currently saved at variable $fastest_time_second_game and $fastest_time_third_game
	mysqli_close($database_connection);
	 ?>
</body>
</html>