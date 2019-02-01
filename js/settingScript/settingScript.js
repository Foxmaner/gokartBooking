function checkPasswordParameters() {
  var strength = document.getElementById("outputPasswordStrength");
  var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
  var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
  var enoughRegex = new RegExp("(?=.{6,}).*", "g");
  var pwd = document.getElementById("inputChangePassword1");
  if (pwd.value.length == 0) {
    strength.innerHTML = "Type Password";
  } else if (false == enoughRegex.test(pwd.value)) {
    strength.innerHTML = "More Characters";
  } else if (strongRegex.test(pwd.value)) {
    strength.innerHTML = " <span style = 'color:green' > Strong! </span>";
  } else if (mediumRegex.test(pwd.value)) {
    strength.innerHTML = " <span style = 'color:orange' > Medium! </span>";
  } else {
    strength.innerHTML = " <span style = 'color:red' > Weak! </span>";
  }
}

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
  }else{
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


function validateAdminPassword(inputPassword){
  var booleanReturn;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      console.log("test!");
      if (this.responseText==="true") {
        console.log("boo");
        booleanReturn = true;
      } else{
        console.log("AA");
        booleanReturn = false;
      }
    }
  }
  xhttp.open("POST", "../../dbConnections/settingConnections/validateAdminPassword.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("sentPassword="+inputPassword);

  return booleanReturn;
}

function validateActionClearRace() {

  alertify.prompt("Är du verkligen säker? Efter denna handling går datan inte att återställa. Bekräfta genom att skriva adminlösenordet", "",
    function(evt, value ){
      if (validateAdminPassword(value)) {
        deleteRace();
        alertify.notify('Lyckat: Race raderade!');
      }else{
        alertify.error('Misslyckat: Fel lösenord')
      }
    },
    function(){
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

function validateActionClearAllData() {

  var inputPrompt = prompt("Är du verkligen säker?\nEfter denna handling går datan inte att återställa\nBekräfta genom att skriva Glabogokarts gatuadress och nummer, utan mellanslag.");
  if (inputPrompt.localeCompare("glabo2", 'en', {
      sensitivity: 'base'
    })) {
    document.getElementById("outputClearDB").innerHTML = "Försök igen: Fel valideringstext";
  } else {
    deleteAllData();

  }
}
