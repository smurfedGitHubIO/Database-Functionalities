<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form method="POST">
		<input type="text" name="username">
		<input type="submit" name="submit" value="Submit">
	</form>
	<?php 
		$database_connection = mysqli_connect("localhost","root","");
		mysqli_select_db($database_connection, "LEMONS");
		if(isset($_POST["submit"])){
			$username = $_POST["username"];
			$text = "";
			$query = mysqli_query($database_connection, "SELECT * FROM `first-game-stats` WHERE username='$username'");
			while($line = mysqli_fetch_array($query, MYSQLI_ASSOC)){
				$text = $text.$line["date"].",".$line["level"].",".$line["time"]."\n";
			}
			$file = fopen("savedData.txt", "w");
			fwrite($file, $text);
			fclose($file);
		}
		mysqli_close($database_connection);
	 ?>
</body>
</html>