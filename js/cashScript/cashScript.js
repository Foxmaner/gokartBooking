function getWeather() {

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log("Weather JSON fetsched" + this.responseText);
      object = JSON.parse(this.responseText);
      console.log("Weather JSON converted to object" + object);
      document.getElementById("weatherSelect").value = object[0].dayWeather;
      document.getElementById("tempInput").value = object[0].dayTemp;
      document.getElementById("weatherRemarkInput").value = object[0].dayRemark;
    }
  }
  xhttp.open("GET", "../../dbConnections/cashConnections/getWeatherConnection.php", true);
  xhttp.send();
}

function updateWeather() {
  var inputTemp = document.getElementById("tempInput").value;
  var inputWeather = document.getElementById("weatherSelect").value;
  var inputRemark = document.getElementById("weatherRemarkInput").value;
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log("updateWeather response:" + this.responseText);
      alertify.notify('Lyckat: Vädret uppdaterades!');
    }
  }
  xhttp.open("POST", "../../dbConnections/cashConnections/updateWeatherConnection.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("inputTemp=" + inputTemp + "&inputWeather=" + inputWeather + "&inputRemark=" + inputRemark);
}

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

function startUpdate() {
  getActiveRace();
  setInterval(function() {

    getActiveRace();


  }, 10000);
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
  xhttp.open("GET", "../../dbConnections/cashConnections/selectNextRaceConnection.php?racenr=" + raceNr, true);
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
  xhttp.open("GET", "../../dbConnections/cashConnections/selectPreviusRaceConnection.php?racenr=" + raceNr, true);
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
      updateChart();
    }
  };
  xhttp.open("GET", "../../dbConnections/cashConnections/editRaceConnection.php?large=" + large + "&small=" + small + "&double=" + double + "&racenr=" + raceNr, true);
  xhttp.send();
}



function selectTextInput(key){
  //1 = upp;
  //2 = ner;
  if (key==1) {
    if (document.getElementById("inputSmallKart") === document.activeElement) {
      document.getElementById("inputLargeKart").focus();
    }else if (document.getElementById("inputDoubleKart") === document.activeElement) {
      document.getElementById("inputSmallKart").focus();
    }else if (document.getElementById("inputLargeKart") === document.activeElement) {

    }else {
      document.getElementById("inputLargeKart").focus();
    }
  }else if (key==2) {
    if (document.getElementById("inputSmallKart") === document.activeElement) {
      document.getElementById("inputDoubleKart").focus();
    }else if (document.getElementById("inputLargeKart") === document.activeElement) {
      document.getElementById("inputSmallKart").focus();
    }else if (document.getElementById("inputDoubleKart") === document.activeElement) {

    }else {
      document.getElementById("inputDoubleKart").focus();
    }
  }
}

function editNumberInput(key) {
  if (key==1) {

  }else if (key==0) {

  }
}

function editNumberInputValue(key) {
  if (key==81) {
    if (document.getElementById("inputLargeKart").value>0) {
      document.getElementById("inputLargeKart").value--;
    }
  }else if (key==87) {
    if (document.getElementById("inputLargeKart").value<10) {
      document.getElementById("inputLargeKart").value++;
    }
  }else if (key==65) {
    if (document.getElementById("inputSmallKart").value>0) {
      document.getElementById("inputSmallKart").value--
    }
  }else if (key==83) {
    if (document.getElementById("inputSmallKart").value<6) {
      document.getElementById("inputSmallKart").value++
    }
  }else if (key==90) {
    if (document.getElementById("inputDoubleKart").value>0) {
      document.getElementById("inputDoubleKart").value--
    }
  }else if (key==88) {
    if (document.getElementById("inputDoubleKart").value<2) {
      document.getElementById("inputDoubleKart").value++
    }
  }
}

var timeout = null;

function btnArrowLeftPressed(){
  clearTimeout(timeout);

  outputEditRaceS();

  timeout = setTimeout(function () {
  selectPreviusRace();
  updateChart();

  }, 200);
}
function btnArrowRightPressed(){
  clearTimeout(timeout);

  outputEditRaceA();

  timeout = setTimeout(function () {
  selectNextRace();
  updateChart();

  }, 200);
}








window.addEventListener('keyup', keyUp, false);



function keyUp(e) {

  clearTimeout(timeout);


  if (e.keyCode === 37) { //39 is the keyCode # for the left arrow key
    outputEditRaceS();


    timeout = setTimeout(function () {
    selectPreviusRace();
    updateChart();

    }, 200);

  } else if (e.keyCode === 39) { //39 is the keyCode # for the right arrow key
    outputEditRaceA();

    timeout = setTimeout(function () {
    selectNextRace();
    updateChart();

    }, 200);

  }else if (e.keyCode === 38) { //38 upp
    selectTextInput(1);
  }else if (e.keyCode === 40) { //40 ner
    selectTextInput(2);
  }else if (e.keyCode === 16) {//HögerShift
    editNumberInput(1);
  }else if (e.keyCode === 17) {//HögerCOntroll
    editNumberInput(0);
  }else if (e.keyCode === 81) {
    editNumberInputValue(81);

    timeout = setTimeout(function () {
    editRace();

    }, 200);

  }else if (e.keyCode ===87) {
    editNumberInputValue(87);

    timeout = setTimeout(function () {
    editRace();

    }, 200);

  }else if (e.keyCode === 65) {
    editNumberInputValue(65);

    timeout = setTimeout(function () {
    editRace();

    }, 200);

  }else if (e.keyCode === 83) {
    editNumberInputValue(83);

    timeout = setTimeout(function () {
    editRace();

    }, 200);

  }else if (e.keyCode === 90) {
    editNumberInputValue(90);

    timeout = setTimeout(function () {
    editRace();

    }, 200);

  }else if (e.keyCode === 88) {
    editNumberInputValue(88);

    timeout = setTimeout(function () {
    editRace();

    }, 200);

  }
}
