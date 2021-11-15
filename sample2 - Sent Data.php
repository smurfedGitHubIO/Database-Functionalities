<?php 
	$database_connection = mysqli_connect("localhost", "root", "");
	mysqli_select_db($database_connection, "lemons_sample");
	$sheesh = $_GET['sheesh'];
	$sql = "UPDATE random SET sheesh = '$sheesh' WHERE num = 4";
	$query = mysqli_query($database_connection, $sql);
	if($query){
		$file = fopen("data.txt","w");
		fwrite($file,"good");
		fclose($file);
	}
	else{
		$file = fopen("data.txt","w");
		fwrite($file,"bad");
		fclose($file);
	}
	mysqli_close($database_connection);
 ?>