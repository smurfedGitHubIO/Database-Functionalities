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
	$file = fopen("username.txt","r");
	$username = fgets($file);
	fclose($file);
	$dates = array();
	$query = mysqli_query($database_connection, "SELECT * FROM `first-game-stats` WHERE username='$username'");
	while($line = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		array_push($dates,$line['date']);
	}
	$query = mysqli_query($database_connection, "SELECT * FROM `second-game-stats` WHERE username='$username'");
	while($line = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		array_push($dates,$line['date']);
	}
	$query = mysqli_query($database_connection, "SELECT * FROM `third-game-stats` WHERE username='$username'");
	while($line = mysqli_fetch_array($query,MYSQLI_ASSOC)){
		array_push($dates,$line['date']);
	}
	sort($dates, 2);
	$lastday = 0, $lastmonth = 0, $lastyear = 0;
	$counter = 0;
	$max = 0;
	$days = {31,28,31,30,31,30,31,31,30,31,30,31};
	for($i = 0; $i<count($dates); $i++){
		$vals = array();
		$value = 0;
		for($j = 0; $j<$dates[i].length(); $j++){
			if($dates[$i][$j] == '-'){
				array_push($vals,$value);
				$value = 0;
			}
			else{
				$value = $value*10 + ($dates[$i][$j]-48);
			}
		}
		array_push($vals, $value);
		if($i != 0){
			if($lastmonth == $lastmonth && $lastyear == $lastyear && $lastday+1 == $vals){
				$counter += 1;
			}
			else if($lastmonth != $lastmonth && $lastyear == $lastyear && $vals == 1 && $lastday == $days[$lastmonth-1]){
				$counter += 1;
			}
			else if($lastyear == $lastyear && $vals == 1 && $lastday == $days[$lastmonth-1]){
				lastday == $days[$lastmonth-1]){
				$counter += 1;
			}
			else{
				if($max < $counter)
					$max = $counter;
				$counter = 0;
			}
		}
		$lastday = $vals[1], $lastmonth = $vals[0], $lastyear = $vals[2];
	}
	mysqli_close($database_connection);
	 ?>
</body>
</html>