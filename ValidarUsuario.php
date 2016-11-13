
<?php
    // PROCESO DE LOGUEO DE USUARIOS
    session_start();
    include'conexion.php';


    // CAPTURAR DATOS DEL FORMULARIO
    $usuario      = $_POST["inputEmail"];
    $clave        = $_POST["inputPassword"];

    // CREAR SENTENCIA SQL PARA
    $sqlCont = "SELECT idusuario, usuario, nombre, apellido,idrol FROM usuario WHERE usuario='$usuario' and password='$clave'";

    $resultCont = mysql_query($sqlCont,$conex);
    $regCont = mysql_fetch_array($resultCont);
    $nombre = "$regCont[nombre]";
    $apellido = "$regCont[apellido]";
    $idusuario ="$regCont[idusuario]";
    $idrol ="$regCont[idrol]";

    // Determinar si existe el usuario
    if (count($regCont["usuario"])==1){
      $statuscol="login";
      $_SESSION["fullname"]=$nombre ." ". $apellido;

	  	$_SESSION["idusuario"] = $idusuario;
     $_SESSION["statuscol"] = $statuscol;

      if($idrol ==1){
        header('Location: homeCocinero.php?');
      }else if($idrol ==2){
        header('Location: homeComensal.php?');
      }
    }else {
        //    echo '<script language="javascript">alert("juas");</script>';
        $statuscol= "error";
        $_SESSION["statuscol"] = $statuscol;

      //  echo "<!DOCTYPE html><html><head><meta charset=\"UTF-8\"><title>Usuario y/o contrasena incorrectos</title></head><body><p>Usuario y/o contrasena incorrectos.</p><a href=\"index.php\">Ir al login.</a></body></html>"
      //

        print "<script>alert(\"Contresaña Incorrecta\");window.location='index.php';</script>";
        //header('Location: index.php?');
        //header('Location: Login.php?MSG=Usuario y/o contrase�a inv�lidos.');

    }
?>
