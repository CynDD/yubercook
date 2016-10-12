with(document.registro){
	onsubmit = function(e){
		e.preventDefault();
		ok = true;
		if(ok && nombreComida.value==""){
			ok=false;
			alert("Debe escribir el nombre de la comida");
			nombreComida.focus();
		}
    precioComida = document.getElementById("inputPrecio").value;
		if(ok && isNaN(precioComida)){
			ok=false;
			alert("Debe escribir un precio de la comida");
			inputPrecio.focus();
		}
		if (ok && inputUbicacion.value==""){
      ok = false;
      alert("Debe escribir la ubicación de la comida.");
      inputUbicacion.focus();
    }
    if (ok && descripcionComida.value == ""){
      ok = false;
      alert("Debe escribir la descripción de la comida.");
      descripcionComida.focus();
    }
    cantidadMinima = document.getElementById("cantMinPersonas").value;
		if(ok && isNaN(cantidadMinima)){
			ok=false;
			alert("Debe escribir una cantidad mínima de personas para que el evento se realice.");
			cantMinPersonas.focus();
		}
    cantidadMaxima = document.getElementById("cantMaxPersonas").value;
		if(ok && isNaN(cantidadMinima)){
			ok=false;
			alert("Debe escribir una cantidad máxima de personas que puedan asistir al evento.");
			cantMaxPersonas.focus();
		}
    aptoParaCeliacos = document.getElementById("aptoCeliacos");
    if( !aptoParaCeliacos.checked ) {
      ok = false;
      alert("Debe seleccionar si su comida es apta para celíacos o no.");
      aptoCeliacos.focus();
    }
		fecha = document.getElementById("fechaComida").value;
		if (ok && fecha == ""){
			ok = false;
			alert("Debe seleccionar una fecha para la comida.");
			fecha.focus();
		}
		hora = document.getElementById("horaComida").value;
		if (ok && hora == "" ){
			ok = false;
			alert("Debe escribir una hora de la comida.");
			hora.focus();
		}
		if(ok){ submit(); }
	}
}
