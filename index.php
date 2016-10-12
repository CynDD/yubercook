<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Yubercook | Bienvenido </title>
  <?php include 'styles.php';?>
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

  <?php include 'menu_login.php'; ?>

  <!--	<div align="center" class="embed-responsive embed-responsive-16by9">
  <img id="imagen" src="assets/img/imagenLogin.jpg" type="imagen">
</img>
</div>

<div align="center" class="imagen">
<img id="imagen" src="chefs.jpg" type="imagen">
</img>
</div>!-->
<body >
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
                <!--<input type="reset" class="btn btn-default" value="Limpiar">-->
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
