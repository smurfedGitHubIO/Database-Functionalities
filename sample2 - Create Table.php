<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form>
		<table>
			<tr>
				<td>1</td>
				<td>2</td>
			</tr>
			<tr>
				<td>1</td>
				<td><input type="checkbox" name="verified"></td>
			</tr>
		</table>
	</form>
	<form method="POST">
		<input type="text" name="text">
		<input type="number" name="number">
		<input type="submit" name="submit" value="Submit">
	</form>
	<?php 
		if(isset($_POST['submit'])){
			$databaseConnection = mysqli_connect("localhost", "root", "");
			mysqli_query($databaseConnection, "CREATE DATABASE IF NOT EXIST LEMONS_Sample");
			mysqli_select_db($databaseConnection, "LEMONS_Sample");
			$text = $_POST['text'];
			$number = $_POST['number'];
			$query = mysqli_query($databaseConnection, "INSERT INTO `random_lang` (username, age) VALUES ('$text', '$number')");
			if($query){
				echo("Goods");
			}
			else{
				echo("Bads");
			}
		}
	 ?>
</body>
</html>