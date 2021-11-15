<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Try</title>
</head>
<body>
	<form action="<?php $_PHP_SELF ?>" method="POST">
		Username: <input type="text" name="username" required>
		Full name: <input type="text" name="fullname" required>
		Age: <input type="number" name="age" required>
		Email Address: <input type="text" name="emailad" required>
		User type (PLAYER, GUARDIAN, EXPERT):<input type="text" name="usertype" required>
		Connections: <input type="text" name="connections" required>
		<input type="submit" name="submit" required>
	</form>
	<div id="errorFuck"></div>
<?php 
if(isset($_POST['submit'])){
	$databaseConnection = mysqli_connect("localhost","root","");
	mysqli_select_db($databaseConnection,"prototype");
	$username = $_POST['username'];
	$fullname = $_POST['fullname'];
	$age = $_POST['age'];
	$emailad = $_POST['emailad'];
	$usertype = $_POST['usertype'];
	$connections = $_POST['connections'];
	$usernameQuery = mysqli_query($databaseConnection, "SELECT * FROM `registered-users` WHERE username='$username';");
	$emailQuery = mysqli_query($databaseConnection, "SELECT * FROM `registered-users` WHERE email_address='$emailad';");
	$usernameCheck = '';
	$emailCheck = '';
	if($usernameQuery){
		while($row = mysqli_fetch_array($usernameQuery, MYSQLI_NUM)){
			for($index = 0; $index < 7; $index ++){
				$usernameCheck .= $row[$index];
			}
		}
		if($usernameCheck != ''){
			echo "Taena, palitan mo username niyan.";
		}
	}
	if($emailQuery){
		while($row = mysqli_fetch_array($emailQuery, MYSQLI_NUM)){
			for($index = 0; $index < 7; $index ++){
				$emailCheck .= $row[$index];
			}
		}
		if($emailCheck != ''){
			echo "Taena, palitan mo email niyan.";
		}
	}
	if($emailCheck == '' && $usernameCheck == ''){
		$query = mysqli_query($databaseConnection, "INSERT INTO `registered-users` (id, username, full_name, age, email_address, user_type, connections) VALUES (54, '$username', '$fullname', '$age', '$emailad', '$usertype', '$connections')");
		if($query){
			echo "Success!";
		}
	}
	mysqli_close($databaseConnection);
}
 ?>
</body>
</html>