<?php 

  require_once 'db/conexion.php';


  if (isset($_POST)) {
    $titulo=isset($_POST['titulo']) ? $_POST['titulo'] : false;
    $contenido=isset($_POST['contenido']) ? $_POST['contenido'] : false;
    $categoria=isset($_POST['categoria']) ? (int)$_POST['categoria'] : false;
    $usuario=$_SESSION['usuario']['id'];
    $imagen=$_FILES['imagen'];
    $nombre_imagen=$imagen['name'];
    $tipo_imagen=$imagen['type'];
      
    if ($tipo_imagen == 'image/png'  ||  $tipo_imagen == 'image/jpg' || $tipo_imagen == 'image/jpeg') {
      
      if (!is_dir('imagenes')) {
        mkdir('imagenes',0777);
      }

      move_uploaded_file($imagen['tmp_name'],'imagenes/'.$nombre_imagen);
    }

    $errores=array();


    if (empty($titulo)) {
      
    $errores['titulo']='El Titulo No Debe Estar Vacio';

    }


    if (empty($contenido)) {
    
     $errores['contenido']='El Contenido No Debe Estar Vacio';

    }

    if (empty($categoria) && !is_numeric($categoria)) {
    
     $errores['categoria']='La Categoria No Debe Estar Vacia';

    }


    if (count($errores)==0) {
      $id=$_GET['id'];
      $usuario=$_SESSION['usuario']['id'];

    $sql="UPDATE noticias SET titulo='$titulo',contenido='$contenido',categoria_id=$categoria ";

     if ($nombre_imagen != null) {

    $sql.=" ,imagen='$nombre_imagen' ";

     }

    $sql.="WHERE id=$id AND usuario_id=$usuario"; 


    $noticias=$conexion->query($sql);

    
      if ($noticias) {
          
          $_SESSION['completo']='La Noticia Ha Sido Modificada Correctamente';
      }else{

        $_SESSION['error-general']='Fallo Al Modificar La Noticia';
      }

    }else{

      $_SESSION['errores']=$errores;
    }

    

  }


  header("Location: editar_noticia.php?id=".$_GET['id']);



 ?>