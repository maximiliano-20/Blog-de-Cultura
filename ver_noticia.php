<?php require_once 'includes/menu.php';  ?>
<?php require_once 'funciones/funciones.php';?>
<?php $noticia_actual=ver_noticia($conexion,$_GET['id'])?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
      <?php if (!empty($noticia_actual)): ?>
        <h4 class="title-border text-center mt-5"><?=$noticia_actual['titulo']?></a></h4>
        <ul class="list-inline d-flex justify-content-between py-3">
          <li class="list-inline-item"><i class="ti-user mr-2"></i> <?=$noticia_actual['nombre'].' '.$noticia_actual['apellido'] ?></li>
          <li class="list-inline-item"><i class="ti-calendar mr-2"></i>
          <?=$noticia_actual['fecha'] ?> </li>
        </ul>
        <img src="imagenes/<?=$noticia_actual['imagen']?>" alt="post-thumb" class="w-100 img-fluid mb-4">
        <span class="insignia badge badge-success mb-2 p-2 text-uppercase "><?=$noticia_actual['categoria']?></span>
        <div class="content">
          <p class="mt-2"><?=$noticia_actual['contenido'] ?></p>
        </div>
      </div>
          <div class="col-lg-4">
        <div class="widget">
         <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $noticia_actual['usuario_id'] ): ?>
        <h4 class="mt-5">Acciones</h4>
        </div>
        <div class="widget">
        <li class=" nav-link text-center"><a class="btn btn-dark btn btn-block"  href="editar_noticia.php?id=<?=$noticia_actual['id']?>">Modificar Noticia</a></li>
        <li class="nav-link text-center"><a class="enlace btn btn-dark btn btn-block"  href="eliminar_noticia.php?id=<?=$noticia_actual['id']?>">Eliminar Noticia</a></li>
        </div>
        <?php else : ?>
          <div class="widget">
          <h4 class="mt-5">Tags</h4>
          <div class="alert alert-warning text-center mt-5"><?=$noticia_actual['categoria'] ?></div>
          <div class="alert alert-warning text-center mt-2"><?=$noticia_actual['titulo'] ?></div>
        </div>
        <?php endif ?>
      </div>
    </div>
  </div>
  <?php 
  else :
  ?>
<div class="alert alert-danger text-center mt-5">No Existe Ninguna Noticia </div>
<?php endif; ?>
</section>
<?php require_once 'includes/footer.php';  ?>
</body>
</html>