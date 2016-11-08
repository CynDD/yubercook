function validarEventoCocinero(){
	//debugger;
	ok = true;
		if(ok && nombreComida.value==""){
			ok=false;
			$('#nombreAlertComida').show();
			nombreComida.focus();
		}
		if (ok && imagenComida.value == null){
			ok = false;
			$('#imagenAlertComida').show();
			imagenComida.focus();
		}
    precioComida = document.getElementById("inputPrecio").value;
		if(ok && isNaN(precioComida)){
			ok=false;
			$('#precioAlertComida').show();
			inputPrecio.focus();
		}
		if (ok && inputUbicacion.value==""){
      ok = false;
      $('#ubicacionAlertComida').show();
      inputUbicacion.focus();
    }
    if (ok && descripcionComida.value == ""){
      ok = false;
      $('#descriocionAlertComida').show();
			descripcionComida.focus();
    }
    cantidadMinima = document.getElementById("cantMinPersonas").value;
		if(ok && isNaN(cantidadMinima)){
			ok=false;
			$('#cantMinAlertComida').show();
			alert("Debe escribir una cantidad mínima de personas para que el evento se realice.");
			cantMinPersonas.focus();
		}
    cantidadMaxima = document.getElementById("cantMaxPersonas").value;
		if(ok && isNaN(cantidadMinima)){
			ok=false;
			$('#cantMaxAlertComida').show();
			cantMaxPersonas.focus();
		}
    aptoParaCeliacos = document.getElementByName("aptoCeliacos[]");
    if( !aptoParaCeliacos[0].checked && !aptoParaCeliacos[1].checked) {
      ok = false;
      alert("Debe seleccionar si su comida es apta para celíacos o no.");
      aptoCeliacosSi.focus();
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
		if(ok){ submit();
		}
	}
