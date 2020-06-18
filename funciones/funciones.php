<?php



function mostrar_errores($errores,$campo){

$alerta='';


if (!empty($errores[$campo]) && isset($campo)) {
	
	$alerta='<div class="alert alert-danger text-center">'.$errores[$campo].'</div>';
}


return $alerta;

} 


function borrar_sesiones(){

	$borrado=false;

	if (isset($_SESSION['errores'])) {
		$_SESSION['errores']=null;
		$borrado=true;
	}


	$borrado=false;


	if (isset($_SESSION['completo'])) {
		$_SESSION['completo']=null;
		$borrado=true;

	}

	$borrado=false;

	if (isset($_SESSION['error-login'])) {
		$_SESSION['error-login']=null;
		$borrado=true;
	}


	$borrado=false;

	if (isset($_SESSION['error-general'])) {
		$_SESSION['error-general']=null;
		$borrado=true;
	}

	return $borrado;
}




function categorias($db){

	$sql="SELECT * FROM categorias";
	$categorias=$db->query($sql);

	$resultado=array();

	if ($categorias && mysqli_num_rows($categorias)>=1) {
		$resultado=$categorias;
	}

	return $categorias;
}


function categoria($db,$id){
   
   $sql="SELECT * FROM categorias WHERE id=$id";
   $categoria=$db->query($sql);

   $resultado=array();

   if ($categoria && mysqli_num_rows($categoria)>=1) {
   	  $resultado=mysqli_fetch_array($categoria);
   }
   
   return $resultado;
}



function noticias($db){

	$sql="SELECT  n.*,c.categoria FROM noticias n "
	."INNER JOIN categorias c ON n.categoria_id=c.id ";

	$noticias=$db->query($sql);

	$resultado=array();


	if ($noticias && mysqli_num_rows($noticias)>=1) {
		$resultado=$noticias;
	}
	return $resultado;
}


function noticia($db,$categoria){

	$sql="SELECT n.*,c.categoria FROM noticias n "
	."INNER JOIN categorias c ON n.categoria_id=c.id "
	."WHERE n.categoria_id=$categoria";
	$noticia=$db->query($sql);

	$resultado=array();


	if ($noticia && mysqli_num_rows($noticia)) {
		$resultado=$noticia;
	}

	return $resultado;

}


function ver_noticia($db,$id){

  $sql="SELECT n.*,c.categoria,u.nombre,u.apellido FROM noticias n "
  ."INNER JOIN categorias c ON n.categoria_id=c.id "
  ."INNER JOIN usuarios u ON n.usuario_id=u.id "
  ."WHERE n.id=$id";

  $ver=$db->query($sql);

  $resultado=array();


  if ($ver && mysqli_num_rows($ver)>=1) {
  	
  	$resultado=mysqli_fetch_array($ver);
  }

  return $resultado;

}

function busqueda($db,$busqueda){

	$sql="SELECT  n.*,c.categoria FROM noticias n "
	."INNER JOIN categorias c ON n.categoria_id=c.id ";
	$sql .= "WHERE n.titulo LIKE '%$busqueda%' ";

	$noticias=$db->query($sql);

	$resultado=array();

	if ($noticias && mysqli_num_rows($noticias)>=1) {

		$resultado=$noticias;
	}
	return $resultado;

 }













 ?>
