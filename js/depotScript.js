function loadData(jsonInput) {

  var obj = JSON.parse(jsonInput);

  document.getElementById("inputLargeKart").value = obj.large;
  document.getElementById("inputSmallKart").value = obj.small;
  document.getElementById("inputDoubleKart").value = obj.double;
}

function startUpdate(){
  setInterval(function(){

    var raceNr = document.getElementById("outputEditLopp").innerHTML;

    var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
        loadRace(this.responseText);
     }
     };
     xhttp.open("GET", "../dbConnections/selectPreviusRaceConnection.php?racenr="+raceNr, true);
     xhttp.send();

  }, 5000);
}
