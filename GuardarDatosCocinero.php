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


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
            <!-- <li><a href="#mu-about-us">NOSOTROS</a></li>
            <li><a href="#mu-restaurant-menu">MENU</a></li>
            <li><a href="#mu-reservation">COMIDAS CERCA DE TI</a></li>
            <li><a href="#mu-gallery">GALERÍA</a></li>
            <li><a href="#mu-login">INGRESAR</a></li>
            <li><a href="#mu-register">REGISTRARSE</a></li>
            <li><a href="#mu-chef">COCINEROS</a></li>
            <!-- <li><a href="#mu-latest-news">BLOG</a></li> -->
            <!--<li><a href="#mu-contact">CONTACTO</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="blog-archive.html">PAGE <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="blog-archive.html">BLOG</a></li>
                <li><a href="blog-single.html">BLOG DETAILS</a></li>
                <li><a href="404.html">404 PAGE</a></li>
              </ul>
            </li>
          </ul>
        </div>/.nav-collapse -->
      </div>
    </nav>
  </header>
<body>
	
  <?php 
         $nombre = $_POST["nombre"];
		 $apellido = $_POST["apellido"];
		 $inputEmail = $_POST["inputEmail"];
		 $inputPassword = $_POST["inputPassword"];
		 $confirmaPassword = $_POST["confirmaPassword"];
		 $telefono = $_POST["telefono"];		 
		 for ($i=0;$i<count($_POST['idiomas']);$i++) {

		  echo "<p>".$_POST['idiomas'][$i]."</p>";		  

		} 
		 $genero = $_POST["genero"];
		 $especialidad = $_POST["especialidad"];
		
		 
		 include'conexion.php';
		 //Inserta un nuevo registro en tabla usuario, con los datos del nuevo cocinero
		 echo $inputPassword;
		 echo $confirmaPassword;
		 if($inputPassword==$confirmaPassword){
			 $sqlregusu ="INSERT INTO usuario (nombre,apellido,fnacimiento,usuario,password,idrol,imagen,telefono,genero,especialidades)
						VALUES ('".$nombre."','".$apellido."',null,'".$inputEmail."','".$inputPassword."',1,null,".$telefono.",'".$genero."','".$especialidad."')";
			 
			 //echo $sqlregusu;		 
			 $result = mysql_query($sqlregusu,$conex);
			 //Extraigo el idusuario del nuevo cocinero para guardar en la tabla idiomausuario los idiomas que conoce el cocinero
			$sqlusu = "SELECT idusuario FROM usuario where usuario='".$inputEmail."'";	
			$result2 = mysql_query($sqlusu,$conex);		
			$reg1 = mysql_fetch_array($result2); 
			
			echo $reg1['idusuario'];
			
			//Almaceno en tabla idiomausuario los idiomas que conoce el cocinero
			for ($i=0;$i<count($_POST['idiomas']);$i++) {
				$sqlidiomausu ="INSERT INTO idiomausuario (idusuario,idioma)
						VALUES (".$reg1['idusuario'].",".$_POST['idiomas'][$i].")";
				$result = mysql_query($sqlidiomausu,$conex);
			}
		}
        
    ?>    
	
</body>
</html>