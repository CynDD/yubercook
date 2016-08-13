function formhash(form, password) {
	// Create a new element input, this will be our hashed password field.
	var p = document.createElement("input");

	// Add the new element to our form.
	form.appendChild(p);
	p.name = "p";
	p.type = "hidden";
	p.value = hex_sha512(password.value);

	// Make sure the plaintext password doesn't get sent.
	password.value = "";

	// Finally submit the form.
	form.submit();
}

function regformhash(form, fullname, email, password, conf) {
	// Check each field has a value
	if (email.value == '' || fullname.value == ''
			|| password.value == '' || conf.value == '') {

		alert('Debe completar todos los campos');
		return false;
	}

	// Check the username

	if (email.value.length > 200) {
		alert('Su email debe tener menos de 200 caracteres');
		form.email.focus();
		return false;
	}

	if (fullname.value.length > 200) {
		alert('Su nombre debe tener menos de 200 caracteres');
		form.fullname.focus();
		return false;
	}

	var re = /((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%_-]).{6,20})/;
	if (!re.test(password.value)) {
		alert('La contraseña debe tener al menos una mayuscula, una minuscula, un numero, un caracter especial y ser de entre 6 y 20 caracteres');
		return false;
	}

		// Check password and confirmation are the same
	if (password.value != conf.value) {
		alert('Las contraseñas no coinciden');
		form.password.focus();
		return false;
	}

	// Create a new element input, this will be our hashed password field.
	var p = document.createElement("input");

	// Add the new element to our form.
	form.appendChild(p);
	p.name = "p";
	p.type = "hidden";
	p.value = hex_sha512(password.value);
	// Make sure the plaintext password doesn't get sent.
	password.value = "";
	conf.value = "";

	// Finally submit the form.
	form.submit();
	return true;
}
