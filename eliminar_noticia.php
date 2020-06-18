<?php 


require_once 'db/conexion.php';


if ($_SESSION['usuario'] && $_GET['id']) {
	
	$id=$_GET['id'];
	$usuario=$_SESSION['usuario']['id'];

	$sql="DELETE FROM noticias WHERE id=$id AND usuario_id=$usuario";
	$borrar=$conexion->query($sql);

}

header('Location:index.php');







 ?>