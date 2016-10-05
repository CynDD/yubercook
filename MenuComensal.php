<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yubercook | Home</title>
    <?php include 'styles.php';?>
</html>


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
            <li><a href="login.php">VOLVER</a></li>
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
<section id="mu-registro" >	
<div id="formulario" style = "padding-left:15px";>

	<form class="form-horizontal" enctype="multipart/form-data" method="POST" action='GuardarDatosCocinero.php'>
	<!-- Encierro en un divisor la imagen para centrarlo div.logo-->
  <!--  <div class="logo">    
        <!-- Pondré un logotipo con img+tab
		<img src="img/perfil.jpeg" alt="Contacto">
    </div>-->
	<div class="mu-registro-area">
           <div class="mu-title">
               <span class="mu-subtitle">Datos Personales</span>
                    <br/>
                    <i class="fa fa-spoon"></i>
                    <span class="mu-title-bar"></span>
                </div>
	
	
	<div class="mu-registro-content">
		<form class="mu-registro-form">
			<div class="form-group">
				<label class="control-label col-md-3 ">Nombre:</label>
			<div class="col-md-8">
				<input type="text" class="form-control" id="nombre" name ="nombre" placeholder="Nombre">
			</div>
			</div>
    <div class="form-group">
        <label class="control-label col-md-3">Apellido:</label>
        <div class="col-md-8">
            <input type="text" class="form-control" id="apellido" name ="apellido" placeholder="Apellido">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Email:</label>
        <div class="col-md-8">
            <input type="email" class="form-control" id="inputEmail" name ="inputEmail" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Password:</label>
        <div class="col-md-8">
            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Confirmar Password:</label>
        <div class="col-md-8">
            <input type="password" class="form-control" id="confirmaPassword" name ="confirmaPassword"  placeholder="Confirmar Password">
        </div>
    </div>
    
    <div class="form-group">
        <label class="control-label col-md-3" >Telefono:</label>
        <div class="col-md-8">
            <input type="tel" class="form-control" id="telefono" name ="telefono" placeholder="Telefono">
        </div>
    </div>
	<div class="form-group">
       <label class="control-label col-md-3">Idiomas:</label>
       <div class="col-md-8">
		<select  name="idiomas[]"  multiple class="form-control">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
		<option value="5">5</option>
	</select>
	</div>
   </div>
    <div class="form-group">
        <label class="control-label col-md-3">F. Nac:</label>
        <div class="col-md-2">
            <select class="form-control">
                <option>Dia</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control">
                <option>Mes</option>
            </select>
        </div>
        <div class="col-md-2">
            <select class="form-control">
                <option>Año</option>
            </select>
        </div>
    </div>
	
	<div class="form-group">
        <label class="control-label col-md-3" >Género:</label>
        <div class="col-md-2">
            <label class="radio-inline">
                <input type="radio" name="genero" value="hombre"> Masculino
            </label>
        </div>
        <div class="col-md-2">
            <label class="radio-inline">
                <input type="radio" name="genero" value="mujer"> Femenino
            </label>
        </div>
    </div>
  
      
    <br>
    <div class="form-group">
        <div class="col-md-offset-2 col-md-9" align="right">
			<input type="reset" class="btn btn-default" value="Limpiar">
			<button type="submit" class="mu-readmore-btn">Enviar</button>
            
            
        </div>
	 
	  </div>
	  </form>
    </div>
	</form>
	</div>

 
  </section>
</body>
</html>
