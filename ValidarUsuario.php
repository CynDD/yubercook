
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
      //$sqllogin ="INSERT INTO status(fecha,userid,statuscol) VALUES (NOW(),'".$idusuario."','".$statuscol."')";
      //$resultCont = mysql_query($sqllogin,$conex);
      //$_SESSION["usuario"] = $usuario;
       $_SESSION["statuscol"] = $statuscol;
       if($idrol ==1){

        header('Location: homeCocinero.php?');
      }else if($idrol ==2){
        header('Location: homeComensal.php?');
      }else {
         echo "error de rol";
      }

    }else{
      $statuscol="error";
		  echo "le erro a la contraseña o al mail";
      header('Location: index.php?');


        //header('Location: Login.php?MSG=Usuario y/o contrase�a inv�lidos.');


     }
?>
