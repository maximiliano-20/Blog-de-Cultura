
<?php require_once 'includes/menu.php';  ?>
<?php require_once 'funciones/funciones.php';?>


<?php $busqueda_actual=busqueda($conexion,$_POST['busqueda']);?>

  
<section class="section">
  <div class="container">
      <h2 class="mb-4 text-center">Busqueda de <?=$_POST['busqueda']?> </h2>
    <div class="row masonry-container">
       <?php if (!empty($busqueda_actual)): ?> 
      <?php while ($buscar = mysqli_fetch_array($busqueda_actual)) :?>
      <div class="col-lg-6 col-sm-6 mb-5">
        <article class="text-center">
          <img class="imagen img-fluid mb-4 w-50 " src="imagenes/<?=$buscar['imagen']?>" alt="post-thumb">
          <h4 class="title-border"><a class="text-dark" href="ver_noticia.php?id=<?=$buscar['id']?>"><?=$buscar['titulo']?></a></h4>
          <span class="insignia badge badge-danger text-uppercase mb-2 "><?=$buscar['categoria']?></span>
          <p class="text-center"><?=substr($buscar['contenido'],0,100)?></p>
        <a  href="ver_noticia.php?id=<?=$buscar['id']?>" class="btn btn-transparent">Leer Mas</a>
        </article>
      </div>
     <?php
      endwhile;
      else : ?>
    </div>
   <div class="alert alert-danger text-center">No Existe Busqueda Relacionada</div>
  </div>
 <?php endif ?>
</section>
<?php require_once 'includes/footer.php';  ?>
</body>
</html>