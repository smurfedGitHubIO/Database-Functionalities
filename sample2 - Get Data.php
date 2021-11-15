<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script type="text/javascript">
		let xmlhttp = new XMLHttpRequest();
		let userData = {};
		function run(){
			xmlhttp.open("GET","data.txt",true);
			xmlhttp.onreadystatechange = handleReadyStateChange;
			xmlhttp.send(null);
		}

		function handleReadyStateChange(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				let val = xmlhttp.responseText;
				document.getElementById('clicked').innerHTML += val;
			}
		}

		function parse(){

		}
	</script>
</head>
<body>
	<form method="POST">
		
	</form>
<?php 
$val = 0;
$databaseConnection = mysqli_connect("localhost","root","");
mysqli_select_db($databaseConnection,"prototype");
$sqlQuery = mysqli_query($databaseConnection,"SELECT * FROM `registered-users` WHERE id=1");
if($sqlQuery){
	$val = mysqli_fetch_array($sqlQuery,MYSQLI_NUM);
}
else{
	echo ("Kingina");
}
$passedValue = '';
for($i = 0; $i<sizeof($val); $i+=1)
	$passedValue .= $val[$i] . '_';
$file = fopen("data.txt","w");
fwrite($file,$passedValue);
fclose($file);
mysqli_close($databaseConnection);
 ?>
	<button onclick="run()">Click me!</button>
	<div id="clicked"></div>
</body>
</html>