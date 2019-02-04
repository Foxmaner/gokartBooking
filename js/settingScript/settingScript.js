function checkSecondUserPassword() {
  var password1 = document.getElementById("inputChangeUserPassword1").value;
  var password2 = document.getElementById("inputChangeUserPassword2").value;

  if (password1 == password2) {
    return true;
  } else {

    return false;
  }

}

function checkSecondAdminPassword() {
  var password1 = document.getElementById("inputChangeAdminPassword1").value;
  var password2 = document.getElementById("inputChangeAdminPassword2").value;

  if (password1 == password2) {
    return true;
  } else {

    return false;
  }

}

function validateChangeUserPassword() {
  if (checkSecondUserPassword()) {

    alertify.prompt("Är du verkligen säker? Efter denna handling går datan inte att återställa. Bekräfta genom att skriva adminlösenordet", "",
      function(evt, value) {
        //2 = radera race data
        validateAdminPassword(value, 3)
      },
      function() {
        alertify.error('Misslyckat: Handligen avbröts');
      }).setHeader('<em> Bekräftelse </em> ').set('type', 'password');
  } else {
    alertify.error("Lösenorden stämmer inte");
    document.getElementById("inputChangeUserPassword1").value = "";
    document.getElementById("inputChangeUserPassword2").value = "";
  }
}

function validateChangeAdminPassword() {
  if (checkSecondAdminPassword()) {

    alertify.prompt("Är du verkligen säker? Efter denna handling går datan inte att återställa. Bekräfta genom att skriva adminlösenordet", "",
      function(evt, value) {
        //2 = radera race data
        validateAdminPassword(value, 4)
      },
      function() {
        alertify.error('Misslyckat: Handligen avbröts');
      }).setHeader('<em> Bekräftelse </em> ').set('type', 'password');
  } else {
    alertify.error("Lösenorden stämmer inte");
    document.getElementById("inputChangeAdminPassword1").value = "";
    document.getElementById("inputChangeAdminPassword2").value = "";
  }
}

function changeUserPassword() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("inputChangeUserPassword1").value = "";
        document.getElementById("inputChangeUserPassword2").value = "";
      }
    };
    xhttp.open("GET", "../../dbConnections/settingConnections/changeUserPassword.php?inputPassword=" + (document.getElementById("inputChangeUserPassword1").value), true);
    xhttp.send();

}

function changeAdminPassword() {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("inputChangeAdminPassword1").value = "";
        document.getElementById("inputChangeAdminPassword2").value = "";
      }
    };
    xhttp.open("GET", "../../dbConnections/settingConnections/changeAdminPassword.php?inputPassword=" + (document.getElementById("inputChangeAdminPassword1").value), true);
    xhttp.send();

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
  }else if (action == 3) {
    if (response == true) {
      changeUserPassword();
      alertify.notify('Lyckat: Userlösenord ändrat!');

    }else{
      alertify.error('Misslyckat: Fel lösenord')
    }
  }else if (action == 4) {
    if (response == true) {
      changeAdminPassword();
      alertify.notify('Lyckat: Adminlösenord ändrat!');

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

function validateActionClearAllData() {

  alertify.prompt("Är du verkligen säker? Detta kommer att byta användarens lösenord. Bekräfta genom att skriva adminlösenordet", "",
    function(evt, value) {
      //2 = radera all data
      validateAdminPassword(value, 3)
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
