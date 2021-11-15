<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Commands</title>
	<script type="text/javascript">
		function store(){
			let username = document.getElementById('username').value;
			let password = document.getElementById('password').value;
			if(username == "admin" && password == "admin"){
				location.href = 'sample2 - Admin Page.php';
			}
			else{
				document.getElementById('error').innerHTML = "Invalid user! Kingina mo.";
			}
		}
	</script>
</head>
<body>
	<form method="POST">
		<label>Username</label>
		<input type="text" name="username" id="username">
		<label>Password</label>
		<input type="password" name="password" id="password">
		<input type="submit" name="submit" value="Submit">
	</form>
	<div id="error"></div>
	<?php 
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$databaseConnection = mysqli_connect("localhost","root","");
		$link = mysqli_select_db($databaseConnection, "prototype");
		if($username == "admin" && $password == "admin"){
			$file = fopen("adminPriveledges.txt","w");
			fwrite($file,"admin : D");
			fclose($file);
			header("Location: sample2 - Admin Page.php");
		}
		else if(!$link){
			echo 'No database has been found.';
		}
		else{
			echo 'Edit pag hindi admin.';
		}
	}
	 ?>
</body>
</html>