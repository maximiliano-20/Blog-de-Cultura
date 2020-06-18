<?php

require_once 'db/conexion.php';

if (isset($_POST)) {
 	
 	$nombre=isset($_POST['nombre']) ? $_POST['nombre'] : false;
 	$apellido=isset($_POST['apellido']) ? $_POST['apellido'] : false;
 	$email=isset($_POST['email']) ? $_POST['email'] : false;
 	$password=isset($_POST['password']) ? $_POST['password'] : false;

 	$errores=array();


 	if (!empty($nombre)) {
 		# code...
 	}else{
 		$errores['nombre']='El Nombre No Debe Estar Vacio';
 	}


 	if (!empty($apellido)) {
 		# code...
 	}else{
 		$errores['apellido']='El Apellido No Debe Estar Vacio';
 	}



 	if (!empty($email)) {
 		# code...
 	}else{
 		$errores['email']='El Email No Debe Estar Vacio';
 	}



 	if (!empty($password)) {
 		# code...
 	}else{

 		$errores['password']='La Contraseña No debe Estar Vacia';
 	}



 	if (count($errores)==0) {
  		$password_segura=password_hash($password, PASSWORD_BCRYPT);
 		$sql="INSERT INTO usuarios VALUES (NULL,'$nombre','$apellido'
 	     '$email','$password_segura')";
 	    $insertar=$conexion->query($sql);
 	    

 	    if ($insertar) {
 	     	
 	     	$_SESSION['completo']='Se Ha Agregado El Usuario Correctamente';

 	     }else{

 	     	$_SESSION['error-general']='Fallo Al Agregar';
 	     }


 	}else{

 		$_SESSION['errores']=$errores;
 	}




 } 


header('Location:formulario_registro.php');


 ?>