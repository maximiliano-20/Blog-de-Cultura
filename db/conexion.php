<?php 



$conexion=mysqli_connect('Localhost', 'root', '', 'cultura');

mysqli_query($conexion,"SET NAMES 'utf8'" );


if (!isset($_SESSION)) {
	session_start();
}






 ?>