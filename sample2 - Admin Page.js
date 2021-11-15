let xmlhttp = new XMLHttpRequest();

function run(){
	xmlhttp.open("POST","adminPriveledges.txt",true);
	xmlhttp.onreadystatechange = handleReadyStateChange;
	xmlhttp.send(null);
}

function handleReadyStateChange(){
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
		let textVal = xmlhttp.responseText;
		if(textVal == "admin : D"){
			document.getElementById('mainDoc').style.display = "block";
		}
		else{
			document.getElementById('mainDoc').style.display = "none";
			document.getElementById('bug').innerHTML = "You're not allowed to enter thee.";
		}
	}
}