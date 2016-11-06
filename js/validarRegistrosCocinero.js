function validarRegistroCocinero(){
	debugger;
	var languages=document.forms["formularioCocinero"]["idiomas[]"].value;
	var fechaN = document.getElementById("fecha").value;
	//var genero = document.getElementByName("genero[]");
	var genero=document.forms["formularioCocinero"]["genero"];
	ok = true;
	if(ok && nombre.value==""){
			ok=false;
		  $('#nombreAlertCocinero').show();
    	nombre.focus();
	} else if(ok && apellido.value==""){
			ok=false;
			//alert("Debe ingresar su apellido.");
      $('#apellidoAlertCocinero').show();
			apellido.focus();
	} else if(ok && inputEmail.value=="" && validarEmail(inputEmail.value) == false){
			ok=false;
			//alert("Debe ingresar su correo electrónico.");
      $('#inputEmailAlertCocinero').show();
      inputEmail.focus();
		} else if(ok && inputPassword.value==""){
			ok=false;
			//alert("Debe ingresar su contraseña.");
      $('#inputPasswordAlertCocinero').show();
      inputPassword.focus();
		} else if(ok && confirmaPassword.value==""){
			ok=false;
			//alert("Debe ingresar su contraseña.");
      $('#confirmaPasswordAlertCocinero').show();
      confirmaPassword.focus();
		} else if(ok && inputPassword.value != confirmaPassword.value){
      ok = false;
      //alert("Debe ingresar contraseñas iguales.");
      $('#passwordEqualsAlertCocinero').show();
      confirmaPassword.focus();
    } else if(ok && telefono.value == null){
      ok = false;
      //alert("Debe ingresar contraseñas iguales.");
      $('#telefonoAlertCocinero').show();
      telefono.focus();
    } else if(ok && (idioma.value == null)){
			//if(ok && (languages[0] == null || languages[0] = "") ){
			ok = false;
			//alert("Debe ingresar un idioma.");
      $('#idiomaAlertCocinero').show();
      idioma.focus();
		} else if (ok && fechaN == ""){
			ok = false;
			//alert("Debe seleccionar una fecha de nacimiento.");
      $('#fechaAlertCocinero').show();
			fecha.focus();
		} else if( ok && genero.checked == 'undefined') {
      ok = false;
      //alert("Debe seleccionar género masculino o femenino.");
      $('#generoAlertCocinero').show();
      generoM.focus();
    }
		if(ok){
      document.forms["formularioCocinero"].submit();
		}else{console.log("error");}
	}

  function validarEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
  }
