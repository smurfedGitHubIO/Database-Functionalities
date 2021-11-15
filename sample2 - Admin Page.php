<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="sample2 - Admin Page.js"></script>
</head>
<body onload="run()">
	<div id="mainDoc">
		<p>hello admin</p>
		<form method="POST">
			<label>CREATE DATABASE</label>
			<input type="text" name="databaseName" id="databaseName">
			<input type="submit" name="databaseCreate" value="Submit">
		</form>
		<!-- Add yung sa mga i-aapprove na mga experts -->
		<form method="POST">
			
		</form>
	</div>
	<div id="bug"></div>
	<?php 
	if(isset($_POST['databaseCreate'])){
		$databaseName = $_POST['databaseName'];
		$databaseConnection = mysqli_connect("localhost", "root", "");
		$databaseLink = mysqli_select_db($databaseConnection, $databaseName);
		if(!$databaseLink){
			//$query = mysqli_query($databaseConnection, "CREATE DATABASE " . $databaseName);
			//mysqli_select_db($databaseConnection, $databaseName);
			//$query = mysqli_query($databaseConnection, "CREATE DATABASE " . $databaseName);
			echo 'GJ!';
		}
		else{
			echo 'Database already exists.';
		}
	}
	 ?>
</body>
</html>