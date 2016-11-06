function validarRegistroCocinero(){
	debugger;
	var languages=document.forms["formularioCocinero"]["idiomas[]"].value;
	var fechaN = document.getElementById("fecha").value;
	//var genero = document.getElementByName("genero[]");
	var genero=document.forms["formularioCocinero"]["genero[]"].value;
	ok = true;
	if(ok && nombre.value==""){
			ok=false;
			alert("Debe ingresar su nombre.");
			nombre.focus();
	} else if(ok && apellido.value==""){
			ok=false;
			alert("Debe ingresar su apellido.");
			apellido.focus();
	} else if(ok && inputEmail.value=="" && validarEmail(inputEmail.value) == false){
			ok=false;
			alert("Debe ingresar su correo electrónico.");
			inputEmail.focus();
		} else if(ok && inputPassword.value==""){
			ok=false;
			alert("Debe ingresar su contraseña.");
			inputPassword.focus();
		} else if(ok && confirmaPassword.value==""){
			ok=false;
			alert("Debe ingresar su contraseña.");
			confirmaPassword.focus();
		} else if(ok && inputPassword.value != confirmaPassword.value){
      ok = false;
      alert("Debe ingresar contraseñas iguales.");
      confirmaPassword.focus();
    } else if(ok && telefono.value == null){
      ok = false;
      alert("Debe ingresar contraseñas iguales.");
      telefono.focus();
    } else if(ok && (languages.isEmpty()) ){
			//if(ok && (languages[0] == null || languages[0] = "") ){
			ok = false;
			alert("Debe ingresar un idioma.");
			idioma.focus();
		} else if (ok && fechaN == ""){
			ok = false;
			alert("Debe seleccionar una fecha de nacimiento.");
			fechaNac.focus();
		} else if( !genero[0].checked && !genero[1].checked) {
      ok = false;
      alert("Debe seleccionar género masculino o femenino.");
      generoM.focus();
    }
		if(ok){
      submit();
		}
	}

function validarRegistroCocinero2(){
	debugger;
	ok = true;
		if(ok && nombre.value==""){
			ok=false;
			alert("Debe ingresar su nombre.");
			nombre.focus();
		}
    if(ok && apellido.value==""){
			ok=false;
			alert("Debe ingresar su apellido.");
			apellido.focus();
		}
    if(ok && inputEmail.value=="" && validarEmail(inputEmail.value) == false){
			ok=false;
			alert("Debe ingresar su correo electrónico.");
			inputEmail.focus();
		}
    if(ok && inputPassword.value==""){
			ok=false;
			alert("Debe ingresar su contraseña.");
			inputPassword.focus();
		}
    if(ok && confirmaPassword.value==""){
			ok=false;
			alert("Debe ingresar su contraseña.");
			confirmaPassword.focus();
		}
    if(ok && inputPassword.value != confirmaPassword.value){
      ok = false;
      alert("Debe ingresar contraseñas iguales.");
      confirmaPassword.focus();
    }
    if(ok && telefono.value == null){
      ok = false;
      alert("Debe ingresar contraseñas iguales.");
      telefono.focus();
    }
		var languages=document.forms["formularioCocinero"]["idiomas[]"].value;
if(ok && (languages.isEmpty()) ){
			//if(ok && (languages[0] == null || languages[0] = "") ){
			ok = false;
			alert("Debe ingresar un idioma.");
			idioma.focus();
		}
		fechaN = document.getElementById("fechaNac").value;
		if (ok && fechaN == ""){
			ok = false;
			alert("Debe seleccionar una fecha de nacimiento.");
			fechaNac.focus();
		}
		genero = document.getElementByName("genero[]");
    if( !genero[0].checked && !genero[1].checked) {
      ok = false;
      alert("Debe seleccionar género masculino o femenino.");
      generoM.focus();
    }
		if(ok){
      submit();
		}
	}

  function validarEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
  }
