<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Log In Try</title>
</head>
<body>
	<form method="POST">
		Username: <input type="text" name="username">
		<input type="submit" name="submit" value="Submit">
	</form>
<?php 
if(isset($_POST['submit'])){
	$databaseConnection = mysqli_connect("localhost","root","");
	mysqli_select_db($databaseConnection, "prototype");
	$username = $_POST['username'];
	$query = mysqli_query($databaseConnection, "SELECT * FROM `registered-users` WHERE username='$username'");
	if($query){
		$val = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$file = fopen("data.txt","w");
		fwrite($file,$val['username']);
		fclose($file);
		echo ("Goods");
		header("Location: sample2 - Main Page.php");
	}
	else{
		echo ("Bads");
	}
	mysqli_close($databaseConnection);
}
 ?>
</body>
</html>