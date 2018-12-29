function editRace() {
  var large = document.getElementById("inputLargeKart").value;
  var small = document.getElementById("inputSmallKart").value;
  var double = document.getElementById("inputDoubleKart").value;
  var raceNr = document.getElementById("textEditLopp").value;

  var xhttp = new XMLHttpRequest();
   xhttp.onreadystatechange = function() {
   	if (this.readyState == 4 && this.status == 200) {
 	    document.getElementById("outputTest").innerHTML = this.responseText;
 	}
   };
   xhttp.open("GET", "../dbConnections/editRaceConnection.php?large="+large+"&small="+small+"&double="+double+"&racenr="+raceNr, true);
   xhttp.send();
}
