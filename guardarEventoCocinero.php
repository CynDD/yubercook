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
         $nombre = $_POST["nombre"];
		 //$imagenComida = $_POST["imagenComida"];
		 $inputPrecio = $_POST["inputPrecio"];
		 $inputUbicacion = $_POST["inputUbicacion"];
		 $descripcionComida = $_POST["descripcionComida"];
		 $cantMinPersonas = $_POST["cantMinPersonas"];		 
		  
		 $cantMaxPersonas = $_POST["cantMaxPersonas"];
		 $aptoCeliacos = $_POST["aptoCeliacos"];
		 $fecha = $_POST["fecha"];
		 $horaComida = $_POST["horaComida"];
		
		 
		 include'conexion.php';
		 //Inserta un nuevo registro en tabla usuario, con los datos del nuevo cocinero
		 echo $nombre;
		 //echo $imagenComida;
		 echo $inputPrecio;
		 echo $inputUbicacion;
		 echo $descripcionComida;
		 echo $cantMinPersonas;
		 echo $cantMaxPersonas;
		 echo $aptoCeliacos;
		 echo $fecha;
		 echo $horaComida;
		
			 $sqlinscomida ="INSERT INTO comida (nombre,imagen,descripcion)
						VALUES ('".$nombre."',null,'".$descripcionComida."')";
			 
			 echo $sqlinscomida;		 
			 $result = mysql_query($sqlinscomida,$conex);
			 //Extraigo el idcomida del nuevo cocinero para guardar en la tabla idiomausuario los idiomas que conoce el cocinero
			$sqlid = "SELECT idcomida FROM comida where nombre='".$nombre."' and descripcion='".$descripcionComida."'";
			echo $sqlid;
			$result2 = mysql_query($sqlid,$conex);				
			$reg1 = mysql_fetch_array($result2); 
			echo "Impime el idcomida= ".$reg1['idcomida'];
			
			$sqlinsevento ="INSERT INTO evento (idcocinero,idcomida,fecha,horainicio,horafin,precio,idubicacion,cantmaxpersonas,cantminpersonas)
						VALUES (1,".$reg1['idcomida'].",'".$fecha."',".$horaComida.",12,".$inputPrecio.",0,".$cantMaxPersonas.",".$cantMinPersonas.")";
			echo $sqlinsevento;		 
			$result = mysql_query($sqlinsevento,$conex);			
			
        
    ?>    
	
</body>
</html>