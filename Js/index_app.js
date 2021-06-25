function show(id) {
  var list = document.getElementsByTagName("form");
  // Hide all the form
  for (let i = 0; i < list.length; i++) {
    list[i].style.setProperty("display", "none");
  }

  // Display the form by id
  var x = document.getElementById(id);
  x.style.setProperty("display", "block");
}

function check() {
  var mdp = document.getElementById("password").value;
  var mdpc = document.getElementById("passwordc").value;
  
  if (mdp == mdpc) {
    return true;
  } else {
    x = document.getElementById("error");
    x.innerHTML = "Veuillez confirmer votre mot de passe";
    x.style.display = "block";
    return false;
  }
}
