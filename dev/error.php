<?php
$error = filter_input(INPUT_GET, 'err', $filter = FILTER_SANITIZE_STRING);

if (! $error) {
    $error = 'Un error desconocido ha pasado.';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
      <title>YuberCook</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

    </head>
    <body>
    <?php include "php/navbar.php"; ?>
    	<div class="container">
		<div class="row">
		<div class="col-md-12">
		<h2>Seguridad 2.0</h2>
		<h3>Hubo un problema</h3>
        <p class="error"><?php echo $error; ?></p>
    </body>
</html>
