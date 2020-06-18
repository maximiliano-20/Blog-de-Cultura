<?php

require_once 'db/conexion.php';


if (isset($_POST)) {
 	
 	$email=trim($_POST['email']);
 	$password=$_POST['password'];


 	$sql="SELECT * FROM usuarios WHERE email='$email'";
 	$login=$conexion->query($sql);


 	if ($login && mysqli_num_rows($login)== 1) {
 		
 		$usuario=mysqli_fetch_array($login);

 		$verificar=password_verify($password, $usuario['password']);

 		if ($verificar) {
 			
 			$_SESSION['usuario']=$usuario;
 			header('Location:index.php');

 		}else{


 			$_SESSION['error-login']='Email y Password Incorrectos';
 			header('Location:formulario_login.php');

 		}
 	}else{

 		$_SESSION['error-login']='Debes Rellenar Los Campos';
 		header('Location:formulario_login.php');

 	}

 }






 ?>