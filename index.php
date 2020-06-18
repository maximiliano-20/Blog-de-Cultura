<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="utf-8">
  <title>Index</title>
<?php require_once 'includes/menu.php';  ?>
<?php require_once 'includes/slider.php';  ?>
<?php require_once 'funciones/funciones.php';?>
<!-- blog post -->
<section class="section">     
  <div class="container">
    <div class="row masonry-container">
       <?php $noticias=noticias($conexion);?>
       <?php if (!empty($noticias)): ?> 
      <?php while ($noticia = mysqli_fetch_array($noticias)) :?>
      <div class="col-lg-4 col-sm-6 mb-5">
        <article class="text-center">
          <img class="imagen mb-4" src="imagenes/<?=$noticia['imagen']?>" alt="post-thumb">
          <h4 class="title-border"><a class="text-dark" href="ver_noticia.php?id=<?=$noticia['id']?>"><?=$noticia['titulo']?></a></h4>
         <span class="badge badge-success mb-2 p-2 text-uppercase "><?=$noticia['categoria']?></span>
          <p><?=substr($noticia['contenido'],0,200)?></p>
          <a  href="ver_noticia.php?id=<?=$noticia['id']?>" class="btn btn-transparent">Leer Mas</a>
        </article>
      </div>
     <?php 
   endwhile; 
    else :
   ?>
    </div>
    <div class="alert alert-warning text-center">No Hay Noticias Posteadas</div>
    <?php endif ?>
  </div>
</section>
<?php require_once 'includes/footer.php';  ?>
</body>
</html>