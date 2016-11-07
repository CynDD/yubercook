
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
<!--<section id="mu-gallery">-->
<!--<?php include 'gallery.php'; ?>--> 
<!--</section>-->
<!-- End Gallery -->

<!-- Start Client Testimonial section -->
<section id="mu-client-testimonial">
    <?php include 'testimonials.php';?>
</section>
<!-- End Client Testimonial section -->

<!-- Start Subscription section -->
<!-- <section id="mu-subscription">
    <?php //include 'subscription.php';?>
</section>-->
<!-- End Subscription section -->

<!-- Start Chef Section -->
<section id="mu-chef">
    <?php include 'chef.php';?>
</section>
<!-- End Chef Section -->

<!-- Start Latest News -->
<section id="mu-latest-news">
    <?php include 'latest-news.php';?>
</section>
<!-- End Latest News -->

<!-- Start Contact section -->
<!--<section id="mu-contact">
// include 'contact.php';?>
</section>-->
<!-- End Contact section

<!-- Start Map section -->
<section id="mu-map">
<iframe src="pepe.html" width="100%" height="100%" frameborder="0"allowfullscreen></iframe>
    <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9207.358598888495!2d-85.64847801496286!3d30.183918972289003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x2320479d70eb6202!2sDillard&#39;s!5e0!3m2!1sbn!2sbd!4v1462359735720" width="100%" height="100%" frameborder="0"allowfullscreen></iframe>
	-->
	</section>
<!-- End Map section -->

<!-- Start Footer -->
<?php include 'footer.php';?>
<!-- End Footer -->
<?php include 'scripts.php';?>
</body>
</html>
