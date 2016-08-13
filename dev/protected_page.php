<?php
include_once 'php/db_connect.php';
include_once 'php/functions.php';

sec_session_start();
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
        <?php if (login_check($mysqli) == true) : ?>
            <p class="lead">Hola <?php echo htmlentities($_SESSION['username']); ?>!</p>
            <p>

            </p>
            <p>Ir al <a href="index.php">home</a></p>
        <?php else : ?>
            <div class="container">
			<div class="row">
			<div class="col-md-12">
                <div class="col-md-6">
                	<div class="alert alert-danger">Usted no esta autorizado a acceder a esta pagina</div>
                Por favor <a href="index.php">inicie sesion</a>.
                </div>
            </div></div></div>
        <?php endif; ?>
    </body>
</html>
