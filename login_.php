<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yubercook | Home</title>
	<?php include 'styles.php';?>
  
</head>
<body>
  
 
  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
      <span>Top</span>
    </a>
  <!-- END SCROLL TOP BUTTON -->
  
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
            
          <li><a href="MenuCocinero.php">Registro Cocinero</a></li>
             <li><a href="MenuComensal.php">Registo Comensal</a></li>
            <!--  <li><a href="#mu-reservation">COMIDAS CERCA DE TI</a></li>
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
  
 <section id="mu-registro">	
 <div id="formulario" style = "padding-left:15px";>
	<div class="mu-registro-area">
           <div class="mu-title">
				
               <span class="mu-subtitle">Login</span>
                    <br/>
                    <i class="fa fa-spoon"></i>
                    <span class="mu-title-bar"></span>
             </div>
 
	<div class="mu-registro-content">
		<form class="mu-registro-form" enctype="multipart/form-data" method="POST" action='ValidarUsuario.php'>
		<div class="form-group">
        <label class="control-label col-md-3" style="color: white">Email:</label>
        <div class="col-md-8">
            <input type="email" class="form-control" id="inputEmail" name ="inputEmail" placeholder="Email">
        </div>
    </div>
     <div class="form-group">
        <label class="control-label col-md-3" style="color: white">Contraseña:</label>
        <div class="col-md-8">
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Contraseña">
        </div>
    </div>
	<div class="form-group">
        <div class="col-md-offset-2 col-md-9" align="right">
			<button type="submit" class="mu-readmore-btn">Iniciar Sesión</button>
            
            
        </div>
	 
	  </div>
    </form>
    </div>
	
	
   
	 </div>
   </div>
</section>
</body>
</html>