<?php 


require_once 'db/conexion.php';

if (isset($_POST)) {
	
	$nombre=isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellido=isset($_POST['apellido']) ? $_POST['apellido'] : false;
    $email=isset($_POST['email']) ? $_POST['email'] : false;
    $usuario=$_SESSION['usuario']['id'];

 $sql="UPDATE usuarios SET nombre='$nombre',  apellido='$apellido',email='$email'  WHERE id=$usuario";
    $usuario=$conexion->query($sql);

    if ($usuario) {
    $_SESSION['usuario']['nombre']=$nombre;
    $_SESSION['usuario']['apellido']=$apellido;
    $_SESSION['usuario']['email']=$email;

    $_SESSION['completo']='Los Datos Del Usuario Han Sido Modififacados Correctamente';
    }else{
    	$_SESSION['error-general']='Fallo Al Modificar El Usuario';
    }

}



header('Location:datos.php');




 ?>