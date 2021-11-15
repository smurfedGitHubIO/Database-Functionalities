function clickMe(){
	var xmlhttp = new XMLHttpRequest();
	var sendMe = "sheesh=isapa";
	xmlhttp.open("GET","sample2 - Sent Data.php?"+sendMe, true);
	xmlhttp.send();
}