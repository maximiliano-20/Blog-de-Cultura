
<?php require_once 'includes/menu.php';  ?>
<?php require_once 'funciones/funciones.php';?>
<?php $categoria_actual=categoria($conexion,$_GET['id'])?>
<?php if (!isset($categoria_actual['id'])): ?>
  <?=header('Location:index.php')?>
<?php endif ?>

  
<section class="section">
  <div class="container">
      <h2 class="mb-4 text-center">Categoria de <?=$categoria_actual['categoria']?> </h2>
    <div class="row masonry-container">
       <?php $noticia=noticia($conexion,$_GET['id']);?>
       <?php if (!empty($noticia)): ?> 
      <?php while ($noti = mysqli_fetch_array($noticia)) :?>
      <div class="col-lg-4 col-sm-6 mb-5">
        <article class="text-center">
          <img class="imagen mb-4" src="imagenes/<?=$noti['imagen']?>" alt="post-thumb">
          <h4 class="title-border"><a class="text-dark" href="ver_noticia.php?id=<?=$noti['id']?>"><?=$noti['titulo']?></a></h4>
          <span class="insignia badge badge-danger text-uppercase mb-2 "><?=$noti['categoria']?></span>
          <p><?=substr($noti['contenido'],0,200)?></p>
        <a  href="ver_noticia.php?id=<?=$noti['id']?>" class="btn btn-transparent">Leer Mas</a>
        </article>
      </div>
     <?php
      endwhile;
      else : ?>
    </div>
   <div class="alert alert-danger text-center">No Existe Ninguna Noticia En Esta Categoria</div>
  </div>
 <?php endif ?>
</section>
<?php require_once 'includes/footer.php';  ?>
</body>
</html>