
<?php
session_start();

if(!isset($_SESSION["statuscol"]) || $_SESSION["statuscol"]==null || $_SESSION["statuscol"]=="error" || $_SESSION["statuscol"]=="logout"){
print "<script>alert(\"Acceso invalido!\");window.location='index.php';</script>";
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Yubercook | Home</title>
    <?php
    //include_once 'php/functions.php';
    include 'styles.php';
    ?>
    </head>
<body>
<!-- Pre Loader -->
<div id="aa-preloader-area">
    <div class="mu-preloader">
        <img src="theme/basic/assets/img/preloader.gif" alt=" loader img">
    </div>
</div>
<!--START SCROLL TOP BUTTON -->
<a class="scrollToTop" href="#">
    <i class="fa fa-angle-up"></i>
    <span>Top</span>
</a>
<!-- END SCROLL TOP BUTTON -->

<!-- Start header section -->
<header id="mu-header">
  <?php include 'menu_Cocinero.php';?>
</header>
<!-- End header section -->


<!-- Start slider  -->
<section id="mu-slider">
    <?php include 'slider.php';?>
</section>
<!-- End slider  -->

<!-- Start About us -->
<section id="mu-about-us">
  <?php include 'about-us.php';?>
</section>
<!-- End About us -->

<!-- Start Counter Section -->
<section id="mu-counter">
    <?php include 'counter.php';?>
</section>
<!-- End Counter Section -->

<!-- Start Restaurant Menu -->
<section id="mu-restaurant-menu">
    <?php include 'restaurant-menu.php';?>
</section>
<!-- End Restaurant Menu -->


<!-- Start Gallery -->
<section id="mu-gallery">
    <?php include 'gallery.php'; ?>
</section>
<!-- End Gallery -->

<!-- Start Client Testimonial section -->
<section id="mu-client-testimonial">
    <?php include 'testimonials.php';?>
</section>
<!-- End Client Testimonial section -->

<!-- Start Subscription section -->
<!--<section id="mu-subscription">
  //  <?php include 'subscription.php';?>
</section>-->
<!-- End Subscription section -->

<!-- Start Chef Section -->
<section id="mu-chef">
    <?php include 'chef.php';?>
</section>
<!-- End Chef Section -->





<!-- Start Footer -->
<?php include 'footer.php';?>
<!-- End Footer -->
<?php include 'scripts.php';?>
</body>
</html>
