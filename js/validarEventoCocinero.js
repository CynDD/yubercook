function validarEventoCocinero(){
//	debugger;
	ok = true;
		if(ok && nombreComida.value==""){
			ok=false;
			$('#nombreAlertComida').show();
			nombreComida.focus();
		}
		if (ok && imagenComida.checked == false){
			ok = false;
			$('#imagenAlertComida').show();
			imagenComida.focus();
		}
    precioComida = document.getElementById("inputPrecio").value;
		if(ok && precioComida == ""){
			ok=false;
			$('#inputPrecioAlertComida').show();
			inputPrecio.focus();
		}

    if (ok && descripcionComida.value == ""){
      ok = false;
      $('#descripcionAlertComida').show();
			descripcionComida.focus();
    }
    cantidadMinima = document.getElementById("cantMinPersonas").value;
		if(ok && cantidadMinima == ""){
			ok=false;
			$('#cantMinAlertComida').show();
		 cantMinPersonas.focus();
		}
    cantidadMaxima = document.getElementById("cantMaxPersonas").value;
		if(ok && cantidadMaxima == ""){
			ok=false;
			$('#cantMaxAlertComida').show();
			cantMaxPersonas.focus();
		}

		inicio = document.getElementById("inicioComida").value;
		if (ok && inicio == "" || inicio == undefined){
			ok = false;
			$('#inicioAlertComida').show();
			inicioComida.focus();
		}
		fin = document.getElementById("finComida").value;
		if (ok && fin == "" || fin == undefined){
			ok = false;
			$('#finAlertComida').show();
			finComida.focus();
		}
		//aptoParaCeliacos = document.getElementByName("aptoCeliacos");
		if( ok && !document.getElementById('Si').checked && !document.getElementById('No').checked) {

      ok = false;
			$('#aptoCeliacosAlertComida').show();
      Si.focus();
    }
		if(ok){
			document.forms["formCocinero"].submit();
	  	}
			else{console.log("error");}
	}
