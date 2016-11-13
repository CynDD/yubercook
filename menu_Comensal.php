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
            <a class="navbar-brand" href="homeComensal.php"><img src="theme/basic/assets/img/logo.png" alt="Logo img"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul id="top-menu" class="nav navbar-nav navbar-right mu-main-nav">
                <li><a href="#"><?php echo "<b>Bienvenido " . $_SESSION["fullname"] . "!</b>"; ?></a></li>
                <li><a href="#mu-about-us">Nosotros</a></li>
				<li><a href="eventosDelComensal.php#latabla" target="_blank">Eventos comprados</a></li>
                <li><a href="comidasCerca.php">Comidas cerca de ti</a></li>
                <li><a href="tablaDeEvento.php#latabla" target="_blank">Ver Eventos</a></li>
                <li><a href="">Cocineros</a></li>
                <li><a href="contact.php">Contacto</a></li>
                <li><a href="logout.php"><b>Salir</b></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
