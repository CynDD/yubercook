<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yubercook | Home</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!-- Slick slider -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css">
    <!-- Date Picker -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datepicker.css">
    <!-- Fancybox slider -->
    <link rel="stylesheet" href="assets/css/jquery.fancybox.css" type="text/css" media="screen" />
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">

    <!-- Main style sheet -->
    <link href="style.css" rel="stylesheet">
  </head>
</html>



    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Prata' rel='stylesheet' type='text/css'>

  </head>
  <body>


  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
      <span>Top</span>
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header section -->
  <header id="mu-header">
    <nav class="navbar navbar-default mu-main-navbar" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->
       <!--   <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="Logo img"></a>-->
        </div>
       <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
            <li><a href="index.html">VOLVER</a></li>
      </div>
    </nav>
  </header>
<body>

  <?php
		 $idevento = $_POST["idevento"];
		 $idusuario = $_POST["idusuario"];
		 


		 include'conexion.php';
		 //Inserta un nuevo registro en tabla usuario, con los datos del nuevo cocinero
		 echo $idevento;
		 echo $idusuario;
			
			//Si quedan cupos en el evento se procede a almacenar
			$sqlev = "SELECT cantcomensales,cantmaxpersonas FROM evento WHERE idcocinero=".$idusuario." and idevento=".$idevento;
			echo $sqlev;
			$resultControl = mysql_query($sqlev,$conex);
			$regControl = mysql_fetch_array($resultControl);
			
			if($regControl['cantcomensales']<$regControl['cantmaxpersonas']){
				//Se insertan los datos del evento en la tabla Evento
				$sqlinsevento ="INSERT INTO comensalevento(idusuario,idevento)
							VALUES (".$idusuario.",".$idevento.")";
				echo $sqlinsevento;
				$result = mysql_query($sqlinsevento,$conex);
				
				//Se actualiza la cantidad de comensales en tabla Evento
				$sqlupdevento ="UPDATE evento SET cantcomensales=(cantcomensales+1)
								WHERE idcocinero=".$idusuario." and idevento=".$idevento." and cantcomensales<cantmaxpersonas)";
				echo $sqlupdevento;
				$result = mysql_query($sqlupdevento,$conex);
			}
			//header('Location: home.php?');
    ?>

</body>
</html>
