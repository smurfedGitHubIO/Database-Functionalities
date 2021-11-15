<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Create Database</title>
</head>
<body>
	<?php 
		$database_connection = mysqli_connect("localhost", "root", "");
		$query = mysqli_query($database_connection, "CREATE DATABASE LEMONS");
		if($query){
			mysqli_select_db($database_connection, "LEMONS");
			mysqli_query($database_connection, "CREATE TABLE `registered-users`( 
				`id` INT AUTO_INCREMENT,
				`username` VARCHAR(255),
				`password` VARCHAR(255),
				`full-name` VARCHAR(255),
				`age` INT,
				`address` VARCHAR(255),
				`email` VARCHAR(255),
				`usertype` VARCHAR(255),
				PRIMARY KEY (`id`)
			)");
			mysqli_query($database_connection, "CREATE TABLE `players`( 
				`id` INT AUTO_INCREMENT,
				`username` VARCHAR(255),
				`daily-star` INT,
				`weekly-star` INT,
				`overall-stars` INT,
				PRIMARY KEY (`id`)
			)");
			mysqli_query($database_connection, "CREATE TABLE `guardians`( 
				`id` INT AUTO_INCREMENT,
				`username` VARCHAR(255),
				`connections` VARCHAR(255),
				PRIMARY KEY (`id`)
			)");
			mysqli_query($database_connection, "CREATE TABLE `first-game-stats`( 
				`id` INT AUTO_INCREMENT,
				`username` VARCHAR(255),
				`date` VARCHAR(255),
				`level` INT,
				`time` INT,
				PRIMARY KEY (`id`)
			)");
			mysqli_query($database_connection, "CREATE TABLE `second-game-stats`( 
				`id` INT AUTO_INCREMENT,
				`username` VARCHAR(255),
				`date` VARCHAR(255),
				`level` INT,
				`time` INT,
				`moves` VARCHAR(255),
				PRIMARY KEY (`id`)
			)");
			mysqli_query($database_connection, "CREATE TABLE `third-game-stats`( 
				`id` INT AUTO_INCREMENT,
				`username` VARCHAR(255),
				`date` VARCHAR(255),
				`level` INT,
				`time` INT,
				PRIMARY KEY (`id`)
			)");
		}
		mysqli_close($database_connection);
	 ?>
</body>
</html>