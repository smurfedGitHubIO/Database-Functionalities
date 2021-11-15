<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript">
	</script>
</head>
<body>
	<form method="POST">
		<input type="text" name="username">
		<input type="password" name="password">
		<input type="text" name="full-name">
		<input type="number" name="age">
		<input type="text" name="address">
		<input type="email" name="email">
		<select id="usertype" name="usertype">
			<option value="player">Player</option>
			<option value="guardian">Guardian</option>
		</select>
		<input type="submit" name="submit" value="Submit">
	</form>
	<?php 
	if(isset($_POST["submit"])){
		$database_connection = mysqli_connect("localhost","root","");
		mysqli_select_db($database_connection, "LEMONS");
		$username = $_POST["username"];
		$password = $_POST["password"];
		$fullname = $_POST["full-name"];
		$age = $_POST["age"];
		$address = $_POST["address"];
		$email = $_POST["email"];
		$usertype = $_POST["usertype"];
		$query = mysqli_query($database_connection,"INSERT INTO `registered-users`(username,password,`full-name`,age,address,email,usertype) VALUES ('$username','$password','$fullname','$age','$address','$email','$usertype')");
		if(!$query){
			echo ("Kingina");
		}
		mysqli_close($database_connection);
	}
	 ?>
</body>
</html>