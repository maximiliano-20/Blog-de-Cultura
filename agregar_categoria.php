

<?php

require_once 'db/conexion.php';

if (isset($_POST)) {
 	
 	$categoria=isset($_POST['categoria']) ? mysqli_real_escape_string($conexion,$_POST['categoria']) : false;

 	$errores=array();


 	if (!empty($categoria)) {
 		
 	}else{

 		$errores['categoria']='La Categoria No Debe Estar Vacia';
 	}


 	if (!is_numeric($categoria)) {
 		# code...
 	}else{

 		$errores['categoria']='Solo Letras Se Deben Ingresar';
 	}


 	if (count($errores)==0) {
 		
 		$sql="INSERT INTO categorias VALUES (NULL,'$categoria')";
 		$categoria=$conexion->query($sql);


 		if ($categoria) {
 			
 			$_SESSION['completo']='La Categoria Ha Sido Agregada';

 		}else{

 			$_SESSION['error-general']='Fallo Al Agregar la Categoria';
 		}



 	}else{

 		$_SESSION['errores']=$errores;
 	}

 } 


header('Location:formulario_categoria.php');


 ?>