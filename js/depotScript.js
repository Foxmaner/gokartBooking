function loadData(jsonInput) {

  var obj = JSON.parse(jsonInput);

  //document.getElementById("outputNextRace").value = obj.nextRace;
  //document.getElementById("outputRaceLeft").value = obj.raceLeft;
  //document.getElementById("outputQueueTime").value = obj.queueTime;

  document.getElementById("outputLarge").innerHTML = obj.large;
  document.getElementById("outputSmall").innerHTML = obj.small;
  document.getElementById("outputDouble").innerHTML = obj.double;
}

function startUpdate(){
  setInterval(function(){

    var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
       if (this.readyState == 4 && this.status == 200) {
        alert(this.responseText);
        loadData(this.responseText);
     }
     };
     xhttp.open("GET", "../dbConnections/depoLoadConnection.php", true);
     xhttp.send();

  }, 5000);
}
