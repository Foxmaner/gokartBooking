function loadData(jsonInput) {
  if (jsonInput=="") {

    document.getElementById("outputNextRace").innerHTML = "Nästa race: " + "N/A";
    document.getElementById("outputRaceLeft").innerHTML = "Race kvar: " + "N/A";
    document.getElementById("outputQueueTime").innerHTML = "Kötid: " + "N/A";

    document.getElementById("outputLarge").innerHTML = "Stora: " + "N/A";
    document.getElementById("outputSmall").innerHTML = "Små: " + "N/A";
    document.getElementById("outputDouble").innerHTML = "Dubbla:" + "N/A";

  }else{

    var obj = JSON.parse(jsonInput);

    document.getElementById("outputNextRace").innerHTML = "Nästa race: " + obj.nextRace;
    document.getElementById("outputRaceLeft").innerHTML = "Race kvar: " + obj.racesLeft;
    document.getElementById("outputQueueTime").innerHTML = "Kötid: " + obj.queueTime;

    document.getElementById("outputLarge").innerHTML = "Stora: " + obj.large;
    document.getElementById("outputSmall").innerHTML = "Små: " + obj.small;
    document.getElementById("outputDouble").innerHTML = "Dubbla:" + obj.double;


  }
}

function updateData() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      //alert(this.responseText);
      loadData(this.responseText);
    }
  };
  xhttp.open("GET", "../../dbConnections/depotConnections/depoLoadConnection.php", true);
  xhttp.send();

}

function startUpdate() {
  setInterval(function() {

    updateData();


  }, 10000);
}

function changeActiveRace(input) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      updateData();

    }
  };
  xhttp.open("GET", "../../dbConnections/depotConnections/changeActiveRaceConnection.php?input=" + input, true);
  xhttp.send();
}



window.addEventListener('keyup', keyUp, false);

function keyUp(e) {
  if (e.keyCode === 39) { //39 is the keyCode # for the right arrow key
    changeActiveRace("a")
  } else if (e.keyCode === 37) { //39 is the keyCode # for the right arrow key
    changeActiveRace("s")
  }
}
