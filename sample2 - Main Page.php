<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Wtf</title>
	<script type="text/javascript">
		let xmlhttp = new XMLHttpRequest();
		function run(){
			xmlhttp.open("POST","data.txt",true);
			xmlhttp.onreadystatechange = handleReadyStateChange;
			xmlhttp.send(null);
		}

		function handleReadyStateChange(){
			if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
				let textVal = xmlhttp.responseText;
				document.getElementById('usernameHere').innerHTML += textVal;
			}
		}
	</script>
</head>
<body onload="run()">
	<div id="usernameHere">Hello </div>
</body>
</html>