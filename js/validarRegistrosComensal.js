function validarRegistroComensal(){
	var genero=document.forms["formularioComensal"]["genero"];
	//var tel = document.getElementById("telefono").value;

	debugger;
	ok = true;
		if(ok && nombre.value==""){
			ok=false;
//			alert("Debe ingresar su nombre.");
		$('#nombreAlertComensal').show();
			nombre.focus();
		}
     if(ok && apellido.value==""){
			ok=false;
		//	alert("Debe ingresar su apellido.");
		$('#apellidoAlertComensal').show();
			apellido.focus();
		}
     if(ok && inputEmail.value=="" && validarEmail(inputEmail.value) == false){
			ok=false;
		//	alert("Debe ingresar su correo electrónico.");
		$('#inputEmailAlertComensal').show();
			inputEmail.focus();
		}
    if(ok && inputPassword.value==""){
			ok=false;
			//alert("Debe ingresar su contraseña.");
			$('#inputPasswordAlertComensal').show();
			inputPassword.focus();
		}
     if(ok && confirmaPassword.value==""){
			ok=false;
			//alert("Debe ingresar su contraseña.");
			$('#confirmaPasswordAlertComensal').show();
			confirmaPassword.focus();
		}
     if(ok && inputPassword.value != confirmaPassword.value){
      ok = false;
      //alert("Debe ingresar contraseñas iguales.");
			$('#passwordEqualsAlertComensal').show();
			confirmaPassword.focus();
    }
		var phone = "^[0-9\\-\\+]{9,15}$";
     if(ok && !telefono.value.match(phone)){
      ok = false;
      //alert("Debe ingresar contraseñas iguales.");
			$('#telefonoAlertComensal').show();
			telefono.focus();
    }
		var languages=document.forms["formularioComensal"]["idiomas[]"].value;
	  if(ok && (languages== "")){
		//if(ok && (languages == null || languages = "") ){
			ok = false;
			//alert("Debe ingresar un idioma.");
			$('#idiomaAlertComensal').show();
			idioma.focus();
		}
		fechaN = document.getElementById("fechaid").value;
	   if (ok && fechaN == ""){
			ok = false;
			//alert("Debe seleccionar una fecha de nacimiento.");
			$('#fechaAlertComensal').show();
			fecha.focus();
		}

    if( ok && !document.getElementById('generoM').checked && !document.getElementById('generoF').checked) {
      ok = false;
      //alert("Debe seleccionar género masculino o femenino.");
			$('#generoAlertComensal').show();
			generoM.focus();
    }
		if(ok){
      document.forms["formularioComensal"].submit();
		}
	}

  function validarEmail(email) {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
  }
