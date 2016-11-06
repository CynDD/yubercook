<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yubercook | Home</title>
	<?php include 'styles.php';?>

</head>
<body>

  <header id="mu-header">
    <?php include 'menu.php';?>
  </header>
  <!-- Start slider  -->
  <section id="mu-slider">
      <?php include 'slider.php';?>
  </section>


  <!--START SCROLL TOP BUTTON -->
  <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>
      <span>Top</span>
  </a>
  <!-- END SCROLL TOP BUTTON -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="mu-contact-area">
                <div class="mu-title">
                    <span class="mu-subtitle"></span>
                    <h2>Contacto</h2>
                    <i class="fa fa-spoon"></i>
                    <span class="mu-title-bar"></span>
                </div>
                <div class="mu-contact-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mu-contact-left">
                                <form class="mu-contact-form">
                                    <div class="form-group">
                                        <label for="name">Su nombre</label>
                                        <input type="text" class="form-control" id="name" placeholder="Nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Su E-mail</label>
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                    <div class="form-group">
                                        <label for="subject">Asunto</label>
                                        <input type="text" class="form-control" id="subject" placeholder="Asunto">
                                    </div>
                                    <div class="form-group">
                                        <label for="message">Mensaje</label>
                                        <textarea class="form-control" id="message" cols="30" rows="10" placeholder="Escriba su mensaje..."></textarea>
                                    </div>
                                    <button type="submit" class="mu-send-btn">Enviar mensaje</button>
                                    <button type="reset" class="mu-reset-btn">Limpiar datos</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mu-contact-right">
                                <div class="mu-contact-widget">
                                    <h3>Oficinas</h3>
                                    <p></p>
                                    <address>
                                        <p><i class="fa fa-phone"></i> (+598) 00 00 00</p>
                                        <p><i class="fa fa-envelope-o"></i>hola@yubercook.tk</p>
                                        <p><i class="fa fa-map-marker"></i>Av. 8 de Octubre, Montevideo, Uruguay.</p>
                                    </address>
                                </div>
                                <div class="mu-contact-widget">
                                    <h3>Horario</h3>
                                    <address>
                                        <p><span>Lunes a Viernes</span> 9:00 a 17:00 hs</p>
                                        <p><span>Sábado</span> 9:00 a 13:00 hs</p>
                                        <p><span>Domingo</span> cerrado</p>
                                    </address>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'scripts.php'; ?>
</body>
</html>
