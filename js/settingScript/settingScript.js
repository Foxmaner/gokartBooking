function changePassword() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("outputChangePassword").innerHTML=(this.responseText);
    }
  };
  xhttp.open("POST", "../../dbConnections/settingConnections/changePassword.php", true);
  xhttp.send("inputPassword="+(document.getElementById("inputChangePassword1").value));
  alert(document.getElementById("inputChangePassword1").value);

}

function deleteRace() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("outputClearDB").innerHTML=(this.responseText);
    }
  };
  xhttp.open("GET", "../../dbConnections/settingConnections/deleteRace.php", true);
  xhttp.send();

}

function validateActionClearRace () {

var inputPrompt = prompt("Är du verkligen säker?\nEfter denna handling går datan inte att återställa\nBekräfta genom att skriva Glabogokarts gatuadress och nummer, utan mellanslag.");
if (inputPrompt.localeCompare("glabo", 'en', {sensitivity: 'base'})) {
  document.getElementById("outputClearDB").innerHTML="Försök igen: Fel valideringstext";
}else {
  deleteRace();

}
}

function deleteAllData() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("outputClearDB").innerHTML=(this.responseText);
    }
  };
  xhttp.open("GET", "../../dbConnections/settingConnections/deleteAllData.php", true);
  xhttp.send();

}

function validateActionClearAllData () {

var inputPrompt = prompt("Är du verkligen säker?\nEfter denna handling går datan inte att återställa\nBekräfta genom att skriva Glabogokarts gatuadress och nummer, utan mellanslag.");
if (inputPrompt.localeCompare("glabo2", 'en', {sensitivity: 'base'})) {
  document.getElementById("outputClearDB").innerHTML="Försök igen: Fel valideringstext";
}else {
  deleteAllData();

}
}
