function validarInicioSesion(){
  //debugger;
  ok = true;
		if(ok && inputEmail.value=="" && validarEmail(inputEmail.value) == false){
			ok=false;
			//alert("Debe ingresar su correo electrónico.");
      $('#inputEmailAlert').show();
			inputEmail.focus();
		}
    if(ok && inputPassword.value ==""){
			ok=false;
			//alert("Debe ingresar su contraseña.");
      $('#inputPasswordAlert').show();
      inputPassword.focus();
		}
    if(ok){
      document.forms["formularioLogin"].submit();
    }
}

function validarEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
