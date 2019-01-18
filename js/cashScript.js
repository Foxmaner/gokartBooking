function outputEditRaceA() {
  var tempRaceNr = document.getElementById("outputEditLopp").innerHTML;

  tempRaceNr = parseInt(tempRaceNr, 10);

  tempRaceNr++;
  document.getElementById("outputEditLopp").innerHTML = tempRaceNr;
}



function outputEditRaceS() {
  var tempRaceNr = document.getElementById("outputEditLopp").innerHTML;

  tempRaceNr = parseInt(tempRaceNr, 10);
  if (tempRaceNr > 1) {
    tempRaceNr--;
  }
  document.getElementById("outputEditLopp").innerHTML = tempRaceNr;
}




function loadRace(jsonInput) {

  var obj = JSON.parse(jsonInput);

  document.getElementById("inputLargeKart").value = obj.large;
  document.getElementById("inputSmallKart").value = obj.small;
  document.getElementById("inputDoubleKart").value = obj.double;
}





function selectNextRace() {
  var raceNr = document.getElementById("outputEditLopp").innerHTML;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      loadRace(this.responseText);

    }
  };
  xhttp.open("GET", "../dbConnections/selectNextRaceConnection.php?racenr=" + raceNr, true);
  xhttp.send();
}





function selectPreviusRace() {
  var raceNr = document.getElementById("outputEditLopp").innerHTML;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      loadRace(this.responseText);
    }
  };
  xhttp.open("GET", "../dbConnections/selectPreviusRaceConnection.php?racenr=" + raceNr, true);
  xhttp.send();

}









function editRace() {
  var large = document.getElementById("inputLargeKart").value;
  var small = document.getElementById("inputSmallKart").value;
  var double = document.getElementById("inputDoubleKart").value;
  var raceNr = document.getElementById("outputEditLopp").innerHTML;
  raceNr = parseInt(raceNr, 10);

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("outputTest").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "../dbConnections/editRaceConnection.php?large=" + large + "&small=" + small + "&double=" + double + "&racenr=" + raceNr, true);
  xhttp.send();
}
