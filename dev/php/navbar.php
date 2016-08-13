<?php
	include_once 'db_connect.php';
	include_once 'functions.php';
 	sec_session_start();
 	$flag = false;
 	if (login_check($mysqli) == true) {
    	$logged = 'in';
    	$flag = true;
	} else {
    	$logged = 'out';
    	$flag = false;
	}
?>
<nav class="navbar navbar-default" role="navigation">
<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="./"><b>YuberCook</b></a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <?php if (login_check($mysqli) == false):?>
      <li><a href="./register.php">Registrarse</a></li>
      <li><a href="./login.php">Iniciar sesión</a></li>
    <?php else:?>
      <li>
        <a href="cifrar_archivo.php">Cifrar Archivo</a>
      </li>
      <li>
        <a href="descifrar_archivo.php">Descifrar Archivo</a>
      </li>
      <!-- <div align="right"> -->
      <li>
        <?php
         $fullname = $_SESSION['fullname'];
         $username = $_SESSION['username'];
	     echo "<a href=\"index.php\">Hola " . $fullname . "</a> ";
        ?>
        </li>
        <li><a href="./logout.php"><b>Salir</b></a></li>
    <?php endif;?>
     </ul>

  </div><!-- /.navbar-collapse -->
</div>
</nav>
