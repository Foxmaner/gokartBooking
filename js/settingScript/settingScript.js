function checkSecondPassword() {
  var password1 = document.getElementById("inputChangePassword1").value;
  var password2 = document.getElementById("inputChangePassword2").value;

  if (password1 == password2) {
    document.getElementById("outputCheckPassword2").innerHTML = "Godkänt";
    return true;
  } else {
    document.getElementById("outputCheckPassword2").innerHTML = "Lösenordet stämmer inte överens";
    return false;
  }

}

function changePassword() {
  if (checkSecondPassword()) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("outputChangePassword").innerHTML = (this.responseText);
      }
    };
    xhttp.open("GET", "../../dbConnections/settingConnections/changePassword.php?inputPassword=" + (document.getElementById("inputChangePassword1").value), true);
    xhttp.send();
  } else {
    alert("Lösenorden stämmer inte")
  }
}

function deleteRace() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("outputClearDB").innerHTML = (this.responseText);
    }
  };
  xhttp.open("GET", "../../dbConnections/settingConnections/deleteRace.php", true);
  xhttp.send();

}


function validateAdminPassword(inputPassword, action) {
  var booleanReturn;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      if (this.responseText === "true") {
        console.log("boo");
        validateAdminPasswordResponse(true, action);
      } else {
        console.log("AA");
        validateAdminPasswordResponse(false, action);
      }
    }
  }
  xhttp.open("POST", "../../dbConnections/settingConnections/validateAdminPassword.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("sentPassword=" + inputPassword);

}

function validateAdminPasswordResponse(response, action) {

  if (action == 1) {
    if (response == true) {
      deleteRace();
      alertify.notify('Lyckat: Race raderade!');

    }else{
      alertify.error('Misslyckat: Fel lösenord')
    }
  } else if (action == 2) {
    if (response == true) {
      deleteAllData();
      alertify.notify('Lyckat: All data raderad!');
      alertify.notify('Stäng ner webbläsaren innan du fortsätter att använda hemsidan');

    }else{
      alertify.error('Misslyckat: Fel lösenord')
    }
  }

}

function validateActionClearRace() {

  alertify.prompt("Är du verkligen säker? Efter denna handling går datan inte att återställa. Bekräfta genom att skriva adminlösenordet", "",
    function(evt, value) {
      //2 = radera race data
      validateAdminPassword(value, 1)
    },
    function() {
      alertify.error('Misslyckat: Handligen avbröts');
    }).setHeader('<em> Bekräftelse </em> ').set('type', 'password');
}

function validateActionClearAllData() {

  alertify.prompt("Är du verkligen säker? Efter denna handling går datan inte att återställa. Bekräfta genom att skriva adminlösenordet", "",
    function(evt, value) {
      //2 = radera all data
      validateAdminPassword(value, 2)
    },
    function() {
      alertify.error('Misslyckat: Handligen avbröts');
    }).setHeader('<em> Bekräftelse </em> ').set('type', 'password');
}

function deleteAllData() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("outputClearDB").innerHTML = (this.responseText);
    }
  };
  xhttp.open("GET", "../../dbConnections/settingConnections/deleteAllData.php", true);
  xhttp.send();

}

function logoutUser(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {


    }
  };
  xhttp.open("POST", "../../dbConnections/settingConnections/logoutUser.php", true);
  xhttp.send();
}
