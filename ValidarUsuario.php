
<?php
    // PROCESO DE LOGUEO DE USUARIOS
    
    include'conexion.php';

        
    // CAPTURAR DATOS DEL FORMULARIO
    $usuario      = $_POST["inputEmail"];
    $clave        = $_POST["inputPassword"];
    
    // CREAR SENTENCIA SQL PARA 
    $sqlCont = "SELECT usuario FROM usuario WHERE usuario='$usuario' and password='$clave'";
    
    $resultCont = mysql_query($sqlCont,$conex);
    $regCont = mysql_fetch_array($resultCont);
  
    
    // Determinar si existe el usuario
    if (count($regCont["usuario"])==1){   
        echo "entro un cocinero";
        header('Location: index.php?');
        
    }else{
		echo "le erro a la contraseña o al mail";
        //header('Location: Login.php?MSG=Usuario y/o contraseña inválidos.');
        
        
     }
?>

