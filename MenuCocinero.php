<<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yubercook | Home</title>
    <?php include 'styles.php';?>
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

  <div id="formulario" style = "padding-left:15px";>

<form class="form-horizontal">
	<!-- Encierro en un divisor la imagen para centrarlo div.logo-->
    <div class="logo">
        <!-- Pondré un logotipo con img+tab-->
		<img src="img/perfil.jpeg" alt="Contacto">
    </div>

	<p class="text-center">Datos personales</p>

	<div class="form-group">
        <label class="control-label col-xs-3">Nombre:</label>
        <div class="col-xs-8">
            <input type="text" class="form-control" placeholder="Nombre">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Apellido:</label>
        <div class="col-xs-8">
            <input type="text" class="form-control" placeholder="Apellido">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Email:</label>
        <div class="col-xs-8">
            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Password:</label>
        <div class="col-xs-8">
            <input type="password" class="form-control" id="inputPassword" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Confirmar Password:</label>
        <div class="col-xs-8">
            <input type="password" class="form-control" placeholder="Confirmar Password">
        </div>
    </div>

    <div class="form-group">
        <label class="control-label col-xs-3" >Telefono:</label>
        <div class="col-xs-8">
            <input type="tel" class="form-control" placeholder="Telefono">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">F. Nacimiento:</label>
        <div class="col-xs-2">
            <select class="form-control">
                <option>Dia</option>
            </select>
        </div>
        <div class="col-xs-2">
            <select class="form-control">
                <option>Mes</option>
            </select>
        </div>
        <div class="col-xs-2">
            <select class="form-control">
                <option>Año</option>
            </select>
        </div>
    </div>

	<div class="form-group">
        <label class="control-label col-xs-3">Género:</label>
        <div class="col-xs-2">
            <label class="radio-inline">
                <input type="radio" name="genderRadios" value="male"> Maculino
            </label>
        </div>
        <div class="col-xs-2">
            <label class="radio-inline">
                <input type="radio" name="genderRadios" value="female"> Femenino
            </label>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-3">Especialidades:</label></br>
        <div class="col-xs-8">
            <textarea rows="3" class="form-control" placeholder="Especialidades"></textarea>
        </div>
    </div>

    <br>
    <div class="form-group">
        <div class="col-xs-offset-3 col-xs-9">
            <input type="submit" class="btn btn-primary" value="Enviar">
            <input type="reset" class="btn btn-default" value="Limpiar">
        </div>
    </div>
</form>
  </div>
</body>
</html>
